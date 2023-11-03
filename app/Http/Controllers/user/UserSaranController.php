<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Saran;
use Illuminate\Http\Request;

class UserSaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Saran', true, route('user.saran.index')],
            ['Index', false],
        ];
        $title = __('saran.title.index');
        $sarans = Saran::where('saran_email', auth()->user()->email)->latest()->get();
        return view('user.saran.index', compact('breadcrumbs', 'title', 'sarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['Saran', true, route('user.saran.index')],
            ['Create', false],
        ];
        $title = __('saran.title.create');
        return view('user.saran.create', compact('breadcrumbs', 'title'));
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

        return redirect()->route('user.saran.create')->with(['color'=> 'bg-success-500', 'message' => __('saran.success.store')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Saran $saran)
    {
        $breadcrumbs = [
            ['Saran', true, route('user.saran.index')],
            [$saran->saran_nama, false],
        ];
        $title = __('saran.title.show');
        return view('user.saran.show', compact('breadcrumbs', 'title', 'saran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Saran $saran)
    {
        $breadcrumbs = [
            ['Saran', true, route('user.saran.index')],
            [$saran->saran_nama, false],
        ];
        $title = __('saran.title.edit');
        return view('user.saran.edit', compact('breadcrumbs', 'title', 'saran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Saran $saran)
    {
        $validated = $request->validate([
            'saran_desc' => 'required',
        ]);

        $saran->update($validated);

        return redirect()->route('user.saran.index')->with(['color'=> 'bg-success-500', 'message' => __('saran.success.update')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Saran $saran)
    {
        $saran->delete();
        return redirect()->back()->with(['color'=> 'bg-success-500', 'message' => __('saran.success.delete')]);
    }
}
