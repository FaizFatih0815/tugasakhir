<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        try {
            $profile = User::find(auth()->user()->id);
            if ($profile) {
                $filepath = $profile->foto;
                $foto = "";
                if ($request->hasFile('foto')) {
                    if (Storage::exists('public/fotoprofile/' . $filepath)) {
                        Storage::delete('public/fotoprofile/' . $filepath);
                    }
                    $file = $request->file('foto')->store('public/fotoprofile');
                    $foto = str_replace('public/', '', $file);
                } else {
                    $foto = $profile->foto;
                }
                $profile->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'foto' => $foto,

                ]);
            }

            return redirect()->back()->with('success', 'Berhasil mengubah profil');
        } catch (Exception $e) {

            return redirect()->back()->with('error', 'Terjadi kesalahan:<br>' . $e->getMessage() . '<br>Silahkan coba lagi.');
        }

        return redirect()->back()->with('error', 'Terjadi kesalahan. Silahkan coba lagi.');
    }
}
