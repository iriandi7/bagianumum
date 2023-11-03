<?php

namespace App\Http\Controllers;

use App\Exports\ArrayExport;
use App\Models\Saran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Saran', true, route('admin.saran.index')],
            ['Index', false],
        ];
        $title = __('saran.title.index');
        $sarans = Saran::latest()->get();

        return view('admin.saran.index', compact('breadcrumbs', 'title', 'sarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['Saran', true, route('admin.saran.index')],
            ['Create', false],
        ];
        $title = __('saran.title.create');

        return view('admin.saran.create', compact('breadcrumbs', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'saran_desc' => 'required',
        ]);
        $validated['saran_nama'] = auth()->user()->name;
        $validated['saran_email'] = auth()->user()->email;
        Saran::create($validated);

        return redirect()->route('admin.saran.create')->with(['color' => 'bg-success-500', 'message' => __('saran.success.store')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Saran $saran)
    {
        $breadcrumbs = [
            ['Saran', true, route('admin.saran.index')],
            [$saran->saran_nama, false],
        ];
        $title = __('saran.title.show');

        return view('admin.saran.show', compact('breadcrumbs', 'title', 'saran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Saran $saran)
    {
        $breadcrumbs = [
            ['Saran', true, route('admin.saran.index')],
            [$saran->saran_nama, false],
        ];
        $title = __('saran.title.edit');

        return view('admin.saran.edit', compact('breadcrumbs', 'title', 'saran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Saran $saran)
    {
        $validated = $request->validate([
            'saran_nama' => 'required|string|max:255',
            'saran_email' => 'required|email:rfc,dns|max:255',
            'saran_desc' => 'required',
        ]);

        $saran->update($validated);

        return redirect()->route('admin.saran.index')->with(['color' => 'bg-success-500', 'message' => __('saran.success.update')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Saran $saran)
    {
        $saran->delete();

        return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('saran.success.delete')]);
    }

    public function excel() {
        $model = __('sidebar.saran');
        $sarans = Saran::all();
        $change[0][0] = __('saran.field.saran_nama');
        $change[0][1] = __('saran.field.saran_email');
        $change[0][2] = __('saran.field.saran_desc');
        $change[0][3] = __('table.created_at');

        foreach($sarans as $key => $saran) {
            $change[$key + 1][0] = $saran->saran_nama;
            $change[$key + 1][1] = $saran->saran_email;
            $change[$key + 1][2] = $saran->saran_desc;
            $change[$key + 1][3] = Carbon::parse($saran->created_at)->format('d M Y');
        }

        $export = new ArrayExport(array($change));
        $filename = 'Export ' . $model .'.xlsx';
        return Excel::download($export, $filename);
    }
}
