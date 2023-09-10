<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admin()
    {
        //Melakukan paginasi untuk data pengguna
        $users = User::paginate(6);
        return view('admin', compact('users'));
    }

    //Membuat public function untuk perubahan pengguna
    public function updateuser($id, Request $request)
    {
        // Memvalidasi bahwa nama, email, dan role harus diisi
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'role.required' => 'Role harus diisi'
        ]);

        //Melakukan perubahan pengguna
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diubah');
    }

    //Membuat public function untuk menambahkan pengguna
    public function adduser(Request $request)
    {
        // Memvalidasi bahwa nama, email, role dan password harus diisi
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

        //Melakukan penambahan pengguna
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambah');
    }

    //Membuat public function untuk menghapus pengguna
    public function deleteuser($id)
    {
        //Mencari id pengguna untuk dihapus
        User::find($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
