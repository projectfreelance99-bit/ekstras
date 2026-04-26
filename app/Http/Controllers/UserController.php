<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function tambahuser()
    {
        return view('admin.user.tambahuser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'user_type' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type
        ]);

        return redirect('admin/user/index')->with('success', "user berhasil ditambah");
    }

    public function edit(User $user)
    {
        
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'user_type' => 'required'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'user_type' => $request->user_type,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect('admin/user/index')->with('success', "user berhasil diperbarui");
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect('admin/user/index')->with('success', "user berhasil dihapus");
    }
}
