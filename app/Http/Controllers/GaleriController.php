<?php

namespace App\Http\Controllers;

use App\Exports\ArrayExport;
use App\Models\Galeri;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Galeri', true, route('admin.galeri.index')],
            ['Index', false],
        ];
        $title = __('galeri.title.index');
        $galeries = Galeri::with('user')->latest()->get();

        return view('admin.galeri.index', compact('breadcrumbs', 'title', 'galeries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['Galeri', true, route('admin.galeri.index')],
            ['Create', false],
        ];
        $title = __('galeri.title.create');

        return view('admin.galeri.create', compact('breadcrumbs', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'galeri_judul' => 'required|string|max:255',
            'galeri_desc' => 'required|string|max:255',
            'galeri_foto' => 'required|file|image',
        ]);

        $validated['galeri_foto'] = $request->galeri_foto->store('image');
        $validated['user_id'] = auth()->id();

        Galeri::create($validated);

        return redirect()->route('admin.galeri.create')->with(['color' => 'bg-success-500', 'message' => __('galeri.success.store')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Galeri $galeri)
    {
        $breadcrumbs = [
            ['Galeri', true, route('admin.galeri.index')],
            [$galeri->galeri_judul, false],
        ];
        $title = __('galeri.title.show');

        return view('admin.galeri.show', compact('breadcrumbs', 'title', 'galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galeri $galeri)
    {
        $breadcrumbs = [
            ['Galeri', true, route('admin.galeri.index')],
            [$galeri->galeri_judul, false],
        ];
        $title = __('galeri.title.edit');

        return view('admin.galeri.edit', compact('breadcrumbs', 'title', 'galeri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galeri $galeri)
    {
        $validated = $request->validate([
            'galeri_judul' => 'required|string|max:255',
            'galeri_desc' => 'required|string|max:255',
            'galeri_foto' => 'file|image',
        ]);

        if ($request->galeri_foto !== null) {
            Storage::delete($galeri->galeri_foto);
            $validated['galeri_foto'] = $request->galeri_foto->store('image');
        }

        $galeri->update($validated);

        return redirect()->route('admin.galeri.index')->with(['color' => 'bg-success-500', 'message' => __('galeri.success.update')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $galeri)
    {
        Storage::delete($galeri->galeri_foto);
        $galeri->delete();

        return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('galeri.success.delete')]);
    }

    public function excel() {
        $model = __('sidebar.galeri');
        $galeries = Galeri::all();
        $change[0][0] = __('galeri.field.galeri_judul');
        $change[0][1] = __('galeri.field.user_id');
        $change[0][2] = __('galeri.field.galeri_desc');
        $change[0][3] = __('table.created_at');
        $change[0][4] = __('galeri.field.galeri_foto');

        foreach($galeries as $key => $galeri) {
            $change[$key + 1][0] = $galeri->galeri_judul;
            $change[$key + 1][1] = $galeri->user ? $galeri->user->name : 'Null';
            $change[$key + 1][2] = $galeri->galeri_desc;
            $change[$key + 1][3] = Carbon::parse($galeri->created_at)->format('d M Y');
            $change[$key + 1][4] = Storage::url($galeri->galeri_foto);
        }

        $export = new ArrayExport(array($change));
        $filename = 'Export ' . $model .'.xlsx';
        return Excel::download($export, $filename);
    }
}
