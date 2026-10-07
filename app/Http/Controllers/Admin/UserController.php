<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('department')
                    ->latest()
                    ->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();

        return view('admin.users.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:100',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|string|min:8',
            'role'          => 'required|in:admin,manager,analyst',
            'department_id' => 'required|exists:departments,id',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $departments = Department::all();

        return view('admin.users.edit', compact('user', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',

        'email' => 'required|email|max:255|unique:users,email,' . $user->id,

        'role' => 'required|in:admin,manager,analyst',

        'department_id' => 'nullable|exists:departments,id',

        'password' => 'nullable|string|min:8|confirmed',
    ]);

    $user->name = $validated['name'];

    $user->email = $validated['email'];

    $user->role = $validated['role'];

    $user->department_id = $validated['department_id'] ?? null;

    // Update password only when a new password is entered
    if (!empty($validated['password'])) {
        $user->password = Hash::make($validated['password']);
    }

    $user->save();

    return redirect()
        ->route('admin.users.index')
        ->with('success', 'User updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }
}