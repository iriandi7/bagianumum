<?php

namespace App\Http\Controllers;

use App\Exports\ArrayExport;
use App\Models\Organisasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Organisasi', true, route('admin.organisasi.index')],
            ['Index', false],
        ];
        $title = __('organisasi.title.index');
        $organisasies = Organisasi::latest()->get();
        return view('admin.organisasi.index', compact('breadcrumbs', 'title', 'organisasies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['Organisasi', true, route('admin.organisasi.index')],
            ['Create', false],
        ];
        $title = __('organisasi.title.create');
        return view('admin.organisasi.create', compact('breadcrumbs', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'organisasi_nama' => ['required', 'string', 'max:255'],
        ]);

        Organisasi::create($validated);

        return redirect()->route('admin.organisasi.create')->with(['color'=> 'bg-success-500', 'message' => __('organisasi.success.store')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Organisasi $organisasi)
    {
        $breadcrumbs = [
            ['Organisasi', true, route('admin.organisasi.index')],
            [$organisasi->organisasi_nama, false],
        ];
        $title = __('organisasi.title.show');
        return view('admin.organisasi.show', compact('breadcrumbs', 'title', 'organisasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organisasi $organisasi)
    {
        $breadcrumbs = [
            ['Organisasi', true, route('admin.organisasi.index')],
            [$organisasi->organisasi_nama, false],
        ];
        $title = __('organisasi.title.edit');
        return view('admin.organisasi.edit', compact('breadcrumbs', 'title', 'organisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organisasi $organisasi)
    {
        $validated = $request->validate([
            'organisasi_nama' => ['required', 'string', 'max:255'],
        ]);

        $organisasi->update($validated);

        return redirect()->route('admin.organisasi.index')->with(['color'=> 'bg-success-500', 'message' => __('organisasi.success.update')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organisasi $organisasi)
    {
        $organisasi->delete();
        return redirect()->back()->with(['color'=> 'bg-success-500', 'message' => __('organisasi.success.delete')]);
    }

    public function excel() {
        $model = __('sidebar.organisasi');
        $organisasis = Organisasi::orderBy('organisasi_nama', 'ASC')->get();
        $change[0][0] = __('organisasi.field.organisasi_nama');
        $change[0][1] = __('table.created_at');
        foreach($organisasis as $key => $organ) {
            $change[$key + 1][0] = $organ->organisasi_nama;
            $change[$key + 1][4] = Carbon::parse($organ->created_at)->format('d M Y');
        }

        $export = new ArrayExport(array($change));
        $filename = 'Export ' . $model .'.xlsx';
        return Excel::download($export, $filename);
    }
}
