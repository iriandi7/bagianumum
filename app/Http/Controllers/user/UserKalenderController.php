<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Kalender;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class UserKalenderController extends Controller
{
    public function index() {
        $breadcrumbs = [
            ['Kalender', true, route('user.kalender.index')],
            ['Index', false],
        ];
        $title = __('kalender.title.index');
        $peminjamans = Peminjaman::with('kalender')->where('user_id', auth()->id())->first();
        return view('user.kalender.index', compact('breadcrumbs', 'title', 'peminjamans'));
    }

    public function show(Kalender $kalender)
    {
        $breadcrumbs = [
            ['Kalender', true, route('user.kalender.index')],
            [$kalender->title, false],
        ];
        $title = __('kalender.title.show');
        return view('user.kalender.show', compact('breadcrumbs', 'title', 'kalender'));
    }

    public function destroy(Kalender $kalender)
    {
        $kalender->delete();
        return redirect()->back()->with(['color'=> 'bg-success-500', 'message' => __('kalender.success.delete')]);
    }
}
