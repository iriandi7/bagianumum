<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Kalender;
use App\Models\Ruangan;
use App\Models\Saran;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $title = __('home.title.index');
        $ruangans = Ruangan::orderBy('ruangan_nama', 'ASC')->get();

        // Kalender
        $kalenders = Kalender::latest()->get();

        $events = [];

        foreach($kalenders as $kalender) {
            $events[] = [
                'id' => $kalender->id,
                'title' => $kalender->title,
                'start' => $kalender->start,
                'end' => $kalender->end,
            ];
        }

        return view('home.index', compact('title', 'ruangans', 'events'));
    }
    public function profil() {
        $title = __('home.title.profil');
        return view('home.profile', compact('title'));
    }

    public function galeri() {
        $title = __('home.title.galeri');
        $galeries = Galeri::orderBy('created_at', 'ASC')->paginate(8);
        return view('home.galeri', compact('title', 'galeries'));
    }

    public function galeri_show(Galeri $galeri) {
        $title = __('home.title.galeri-show');
        return view('home.galeri-show', compact('title', 'galeri'));
    }

    public function kalender() {
        $title = __('home.title.kalender');
        $kalenders = Kalender::latest()->get();

        $events = [];

        foreach($kalenders as $kalender) {
            $events[] = [
                'id' => $kalender->id,
                'title' => $kalender->title,
                'start' => $kalender->start,
                'end' => $kalender->end,
            ];
        }

        return view('home.kalender', compact('title', 'events'));
    }

    public function kalender_show(Kalender $kalender) {
        $title = __('kalender.title.show');
        return view('home.kalender-show', compact('title', 'kalender'));
    }

    public function ruangan() {
        $title = __('home.title.ruangan');

        $ruangans = Ruangan::orderBy('ruangan_nama', 'ASC')->get();
        return view('home.ruangan', compact('title', 'ruangans'));
    }

    public function saran() {
        $title = __('home.title.saran');
        return view('home.saran', compact('title'));
    }

    public function storeSaran(Request $request) {
        $validated = $request->validate([
            'saran_nama' => 'required|string|max:255',
            'saran_email' => 'required|email:rfc,dns|max:255',
            'saran_desc' => 'required',
        ]);

        Saran::create($validated);
        return redirect()->back()->with(['color'=> 'bg-success-500', 'message' => __('saran.success.store')]);
    }

}
