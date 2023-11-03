<?php

namespace App\Http\Controllers;

use App\Models\Kalender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index() {
        $role = auth()->user()->role;
        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else if ($role === 'user') {
            return redirect()->route('user.dashboard');
        }
    }

    public function admin() {
        $breadcrumbs = [
            [__('navbar.home'), false],
        ];
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

        return view('admin.dashboard.index', compact('breadcrumbs', 'title', 'events'));
    }

    public function user() {
        $breadcrumbs = [
            [__('navbar.home'), false],
        ];
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

        return view('user.dashboard.index', compact('breadcrumbs', 'title', 'events'));
    }

    public function image() {
        dd(Str::uuid());
    }
}
