<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $users = User::paginate(6);
        return view('admin', compact('users'));
    }
    public function updateuser($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'role.required' => 'Role harus diisi'
        ]);

        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diubah');
    }
    public function adduser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'role.required' => 'Role harus diisi',
            'password.required' => 'Password harus diisi'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambah');
    }
    public function deleteuser($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
