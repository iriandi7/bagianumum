<?php

namespace App\Http\Controllers;

use App\Exports\ArrayExport;
use App\Mail\Mailer;
use App\Models\Kalender;
use App\Models\Organisasi;
use App\Models\Peminjaman;
use App\Models\Ruangan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Peminjaman', true, route('admin.peminjaman.index')],
            ['Index', false],
        ];
        $title = __('peminjaman.title.index');
        $peminjamans = Peminjaman::with('user', 'organisasi', 'ruangan')->orderBy('peminjaman_status', 'ASC')->get();

        return view('admin.peminjaman.index', compact('breadcrumbs', 'title', 'peminjamans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['Peminjaman', true, route('admin.peminjaman.index')],
            ['Create', false],
        ];
        $title = __('peminjaman.title.create');
        $organisasies = Organisasi::orderBy('organisasi_nama', 'ASC')->get();
        $ruangans = Ruangan::orderBy('ruangan_nama', 'ASC')->get();

        return view('admin.peminjaman.create', compact('breadcrumbs', 'title', 'organisasies', 'ruangans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'organisasi_id' => 'required',
            'nama_acara' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'ruangan_id' => 'required',
            'no_surat' => 'nullable|string',
        ]);

        $validated['user_id'] = auth()->id();

        $peminjaman = Peminjaman::create($validated);

        $status = "Proses";
        $body = "<div><h1>Halo " . $peminjaman->user->name . ",</h1><p>Kami senang memberitahu Anda bahwa permintaan peminjaman ruangan Anda" . $status . ". Berikut adalah detail peminjaman ruangan:</p><ul><li>Nama Acara: " .  $peminjaman->nama_acara . "</li><li>Nama Organisasi: " .  $peminjaman->organisasi->organisasi_nama . "</li><li>Nama Ruangan: " .  $peminjaman->ruangan->ruangan_nama . "</li><li>Tanggal Meminjam: " .  $peminjaman->tanggal_pinjam . "</li><li>Tanggal Mengembalikan: " .  $peminjaman->tanggal_kembali . "</li><li>Nomor Surat: " .  $peminjaman->no_surat . "</li></ul><p>Jangan ragu untuk menghubungi kami jika Anda membutuhkan informasi tambahan atau ada perubahan dalam rencana Anda.Terima kasih atas kerjasamanya!</p><p>Hormat Kami,</p><p><strong>Bagian Umum Sekretariat Daerah Kota Batu</strong></p></div>";
        $mailer = new Mailer($body, 'Notifikasi Peminjaman Ruangan');

        Mail::to(auth()->user()->email)->send($mailer);

        return redirect()->route('admin.peminjaman.create')->with(['color' => 'bg-success-500', 'message' => __('peminjaman.success.store')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        $breadcrumbs = [
            ['Peminjaman', true, route('admin.peminjaman.index')],
            [$peminjaman->nama_acara, false],
        ];
        $title = __('peminjaman.title.show');

        return view('admin.peminjaman.show', compact('breadcrumbs', 'title', 'peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        if ($peminjaman->peminjaman_status !== 'Proses') {
            return redirect()->route('admin.peminjaman.index')->with(['color' => 'bg-danger-500', 'message' => __('peminjaman.access-decline')]);
        }
        $breadcrumbs = [
            ['Peminjaman', true, route('admin.peminjaman.index')],
            [$peminjaman->nama_acara, false],
        ];
        $title = __('peminjaman.title.edit');
        $organisasies = Organisasi::orderBy('organisasi_nama', 'ASC')->get();
        $ruangans = Ruangan::orderBy('ruangan_nama', 'ASC')->get();

        return view('admin.peminjaman.edit', compact('breadcrumbs', 'title', 'peminjaman', 'organisasies', 'ruangans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $validated = $request->validate([
            'organisasi_id' => 'required',
            'nama_acara' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'ruangan_id' => 'required',
            'no_surat' => 'nullable|string',
            'peminjaman_status' => 'required',
        ]);
        $peminjaman->update($validated);

        $status = $validated['peminjaman_status'];
        if ($status == 'Terima') {
            // Menerima Peminjaman
            Kalender::create([
                'peminjaman_id' => $peminjaman->id,
                'title' => $peminjaman->nama_acara,
                'start' => $peminjaman->tanggal_pinjam,
                'end' => $peminjaman->tanggal_kembali,
            ]);

            $body = "<div><h1>Halo " . $peminjaman->user->name . ",</h1><p>Kami senang memberitahu Anda bahwa permintaan peminjaman ruangan Anda <span><strong>Diterima</strong></span>. Berikut adalah detail peminjaman ruangan:</p><ul><li>Nama Acara: " .  $peminjaman->nama_acara . "</li><li>Nama Organisasi: " .  $peminjaman->organisasi->organisasi_nama . "</li><li>Nama Ruangan: " .  $peminjaman->ruangan->ruangan_nama . "</li><li>Tanggal Meminjam: " .  $peminjaman->tanggal_pinjam . "</li><li>Tanggal Mengembalikan: " .  $peminjaman->tanggal_kembali . "</li><li>Nomor Surat: " .  $peminjaman->no_surat . "</li></ul><p>Jangan ragu untuk menghubungi kami jika Anda membutuhkan informasi tambahan atau ada perubahan dalam rencana Anda.Terima kasih atas kerjasamanya!</p><p>Hormat Kami,</p><p><strong>Bagian Umum Sekretariat Daerah Kota Batu</strong></p></div>";
            $mailer = new Mailer($body, 'Notifikasi Peminjaman Ruangan');

            Mail::to($peminjaman->user->email)->send($mailer);

            return redirect()->route('admin.peminjaman.index')->with(['color' => 'bg-success-500', 'message' => __('peminjaman.success.update') . ' & ' . __('peminjaman.success.update-accept')]);
        } elseif ($status == 'Tolak') {
            // Menolak Peminjaman
            $body = "<div><h1>Halo " . $peminjaman->user->name . ",</h1><p>Kami senang memberitahu Anda bahwa permintaan peminjaman ruangan Anda <span><strong>Ditolak</strong></span>. Berikut adalah detail peminjaman ruangan:</p><ul><li>Nama Acara: " .  $peminjaman->nama_acara . "</li><li>Nama Organisasi: " .  $peminjaman->organisasi->organisasi_nama . "</li><li>Nama Ruangan: " .  $peminjaman->ruangan->ruangan_nama . "</li><li>Tanggal Meminjam: " .  $peminjaman->tanggal_pinjam . "</li><li>Tanggal Mengembalikan: " .  $peminjaman->tanggal_kembali . "</li><li>Nomor Surat: " .  $peminjaman->no_surat . "</li></ul><p>Jangan ragu untuk menghubungi kami jika Anda membutuhkan informasi tambahan atau ada perubahan dalam rencana Anda.Terima kasih atas kerjasamanya!</p><p>Hormat Kami,</p><p><strong>Bagian Umum Sekretariat Daerah Kota Batu</strong></p></div>";
            $mailer = new Mailer($body, 'Notifikasi Peminjaman Ruangan');
            Mail::to($peminjaman->user->email)->send($mailer);
            return redirect()->route('admin.peminjaman.index')->with(['color' => 'bg-success-500', 'message' => __('peminjaman.success.update-decline')]);
        }

        // Tanpa Merubah Status
        return redirect()->route('admin.peminjaman.index')->with(['color' => 'bg-success-500', 'message' => __('peminjaman.success.update')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        if ($peminjaman->peminjaman_status !== 'Proses') {
            return redirect()->route('admin.peminjaman.index')->with(['color' => 'bg-danger-500', 'message' => __('peminjaman.access-decline')]);
        }
        $peminjaman->delete();

        return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('peminjaman.success.delete')]);
    }

    public function excel()
    {
        $model = __('sidebar.peminjaman');
        $peminjamans = Peminjaman::with('user', 'organisasi', 'ruangan')->get();

        $change[0][0] = __('peminjaman.field.user_id');
        $change[0][1] = __('peminjaman.field.organisasi_id');
        $change[0][2] = __('peminjaman.field.nama_acara');
        $change[0][3] = __('peminjaman.field.tanggal_pinjam');
        $change[0][4] = __('peminjaman.field.tanggal_kembali');
        $change[0][5] = __('peminjaman.field.ruangan_id');
        $change[0][6] = __('peminjaman.field.no_surat');
        $change[0][7] = __('peminjaman.field.peminjaman_status');
        $change[0][8] = __('table.created_at');

        foreach ($peminjamans as $key => $peminjaman) {
            $change[$key + 1][0] = $peminjaman->user->name;
            $change[$key + 1][1] = $peminjaman->organisasi->organisasi_nama;
            $change[$key + 1][2] = $peminjaman->nama_acara;
            $change[$key + 1][3] = $peminjaman->tanggal_pinjam;
            $change[$key + 1][4] = $peminjaman->tanggal_kembali;
            $change[$key + 1][5] = $peminjaman->ruangan->ruangan_nama;
            $change[$key + 1][6] = $peminjaman->no_surat;
            $change[$key + 1][7] = $peminjaman->peminjaman_status;
            $change[$key + 1][8] = Carbon::parse($peminjaman->created_at)->format('d M Y');
        }

        $export = new ArrayExport(array($change));
        $filename = 'Export ' . $model . '.xlsx';
        return Excel::download($export, $filename);
    }
}
