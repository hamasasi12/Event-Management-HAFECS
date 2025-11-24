<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeminarRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Vinkla\Hashids\Facades\Hashids;

class SeminarRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seminarRegistration = SeminarRegistration::with('seminar')->latest()->get();
        return view('admin.seminar_registration.index', compact('seminarRegistration'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $roles = Role::all();
        // return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8|confirmed',
        //     'role' => 'required|exists:roles,name',
        // ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // $user->assignRole($request->role);

        // return redirect()->route('admin.users.index')
        //     ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($user_hashid)
    {
        $id = Hashids::decode($user_hashid)[0] ?? null;
        $user = User::findOrFail($id);
        $user->load('roles', 'seminars');
        return view('admin.seminar_registration.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user_hashid)
    {
        $id = Hashids::decode($user_hashid)[0] ?? null;
        $user = User::findOrFail($id);
        return view('admin.seminar_registration.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_hashid)
    {
        $id = Hashids::decode($user_hashid)[0] ?? null;
        $user = User::findOrFail($id);
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        //     'role' => 'required|exists:roles,name',
        // ]);

        // $user->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        // ]);

        // // Sync roles
        // $user->syncRoles($request->role);

        // return redirect()->route('admin.users.index')
        //     ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_hashid)
    {
        $id = Hashids::decode($user_hashid)[0] ?? null;
        $user = User::findOrFail($id);
        // // Prevent deleting the currently logged in user
        // if ($user->id === auth()->id()) {
        //     return redirect()->route('admin.users.index')
        //         ->with('error', 'You cannot delete yourself.');
        // }

        // $user->delete();

        // return redirect()->route('admin.users.index')
        //     ->with('success', 'User deleted successfully.');
    }
}