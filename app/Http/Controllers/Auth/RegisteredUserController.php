<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Laravolt\Avatar\Avatar;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'no_phone' => ['required', 'string', 'unique:users,no_phone', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'no_phone' => $request->no_phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        $image = 'profile/' . $user->id . '.png';

        $avatar = new Avatar();

        $avatar->create($user->name)->save('storage/' . $image);

        $user->update(['profile_photo' => $image]);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
