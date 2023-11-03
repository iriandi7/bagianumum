<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
use Laravolt\Avatar\Avatar;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['User', true, route('admin.user.index')],
            ['Index', false],
        ];
        $title = __('user.title.index');
        $users = User::latest()->get();
        return view('admin.user.index', compact('breadcrumbs', 'title', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['User', true, route('admin.user.index')],
            ['Create', false],
        ];
        $title = __('user.title.create');
        return view('admin.user.create', compact('breadcrumbs', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'no_phone' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_phone' => $request->no_phone,
            'password' => Hash::make($request->password),
            'email_verified_at' => now()
        ]);

        $image = 'profile/' . $user->id . '.png';

        $avatar = new Avatar();

        $avatar->create($user->name)->save('storage/' . $image);

        $user->update(['profile_photo' => $image]);

        return redirect()->route('admin.user.index')->with(['color'=> 'bg-success-500', 'message' => __('user.success.store')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $breadcrumbs = [
            ['User', true, route('admin.user.index')],
            [$user->name, false],
        ];
        $title = __('user.title.show');
        return view('admin.user.show', compact('breadcrumbs', 'title', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $role = $user->role;
        if ($role == 'admin') {
            $new_role = 'user';
        } else {
            $new_role = 'admin';
        }

        $user->update([
            'role' => $new_role
        ]);
        return redirect()->back()->with(['color'=> 'bg-success-500', 'message' => __('user.success.role')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with(['color'=> 'bg-success-500', 'message' => __('user.success.delete')]);
    }

    public function archive() {
        $breadcrumbs = [
            ['User', true, route('admin.user.index')],
            ['Archive', false],
        ];
        $title = __('user.title.archive');
        $users = User::onlyTrashed()->get();
        return view('admin.user.archive', compact('breadcrumbs', 'title', 'users'));
    }

    public function restore($id) {
        User::withTrashed()->where('id', $id)->restore();
        return redirect()->back()->with(['color'=> 'bg-success-500', 'message' => __('user.success.restore')]);
    }
}
