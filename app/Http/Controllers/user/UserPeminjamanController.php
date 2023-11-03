<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Mail\Mailer;
use App\Mail\MailNotification;
use App\Models\Organisasi;
use App\Models\Peminjaman;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Peminjaman', true, route('user.peminjaman.index')],
            ['Index', false],
        ];
        $title = __('peminjaman.title.index');
        $peminjamans = Peminjaman::with('user', 'organisasi', 'ruangan')->where('user_id', auth()->id())->orderBy('peminjaman_status', 'ASC')->get();
        return view('user.peminjaman.index', compact('breadcrumbs', 'title', 'peminjamans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['Peminjaman', true, route('user.peminjaman.index')],
            ['Create', false],
        ];
        $title = __('peminjaman.title.create');
        $organisasies = Organisasi::orderBy('organisasi_nama', 'ASC')->get();
        $ruangans = Ruangan::orderBy('ruangan_nama', 'ASC')->get();
        return view('user.peminjaman.create', compact('breadcrumbs', 'title', 'organisasies', 'ruangans'));
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
            'no_surat' => 'nullable|string'
        ]);

        $validated['user_id'] = auth()->id();

        $peminjaman = Peminjaman::create($validated);

        $status = "Proses";

        $body = "<div><h1>Halo " . $peminjaman->user->name .",</h1><p>Kami senang memberitahu Anda bahwa permintaan peminjaman ruangan Anda" . $status .". Berikut adalah detail peminjaman ruangan:</p><ul><li>Nama Acara: " .  $peminjaman->nama_acara . "</li><li>Nama Organisasi: " .  $peminjaman->organisasi->organisasi_nama . "</li><li>Nama Ruangan: " .  $peminjaman->ruangan->ruangan_nama . "</li><li>Tanggal Meminjam: " .  $peminjaman->tanggal_pinjam . "</li><li>Tanggal Mengembalikan: " .  $peminjaman->tanggal_kembali . "</li><li>Nomor Surat: " .  $peminjaman->no_surat . "</li></ul><p>Jangan ragu untuk menghubungi kami jika Anda membutuhkan informasi tambahan atau ada perubahan dalam rencana Anda.Terima kasih atas kerjasamanya!</p><p>Hormat Kami,</p><p><strong>Bagian Umum Sekretariat Daerah Kota Batu</strong></p></div>";

        $mailer = new Mailer($body, 'Notifikasi Peminjaman Ruangan');

        Mail::to(auth()->user()->email)->send($mailer);

        $admins = User::where('role', 'admin')->get();

        $admin_notif = new Mailer("<h1>Halo Admin,</h1><p>Kami ingin memberitahukan kepada Anda bahwa terdapat permintaan peminjaman ruangan dari salah satu pengguna yang memerlukan tinjauan lebih lanjut.</p>", 'Notifikasi Peminjaman Ruangan');

        foreach ($admins as $admin){
            Mail::to($admin->email)->send($admin_notif);
        }

        return redirect()->route('user.peminjaman.create')->with(['color' => 'bg-success-500', 'message' => __('peminjaman.success.store')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        $breadcrumbs = [
            ['Peminjaman', true, route('user.peminjaman.index')],
            [$peminjaman->nama_acara, false],
        ];
        $title = __('peminjaman.title.show');
        return view('user.peminjaman.show', compact('breadcrumbs', 'title', 'peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        if ($peminjaman->peminjaman_status !== 'Proses') {
            return redirect()->route('user.peminjaman.index')->with(['color' => 'bg-danger-500', 'message' => __('peminjaman.access-decline')]);
        }
        $breadcrumbs = [
            ['Peminjaman', true, route('user.peminjaman.index')],
            [$peminjaman->nama_acara, false],
        ];
        $title = __('peminjaman.title.edit');
        $organisasies = Organisasi::orderBy('organisasi_nama', 'ASC')->get();
        $ruangans = Ruangan::orderBy('ruangan_nama', 'ASC')->get();
        return view('user.peminjaman.edit', compact('breadcrumbs', 'title', 'peminjaman', 'organisasies', 'ruangans'));
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
            'no_surat' => 'nullable|string'
        ]);

        $peminjaman->update($validated);

        return redirect()->route('user.peminjaman.index')->with(['color' => 'bg-success-500', 'message' => __('peminjaman.success.update')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        if ($peminjaman->peminjaman_status !== 'Proses') {
            return redirect()->route('user.peminjaman.index')->with(['color' => 'bg-danger-500', 'message' => __('peminjaman.access-decline')]);
        }
        $peminjaman->delete();
        return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('peminjaman.success.delete')]);
    }
}
