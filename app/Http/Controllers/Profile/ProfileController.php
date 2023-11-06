<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProfileController extends Controller
{
    public function index()
    {
        return view('Profile.mainprofile');
    }

    public function saveProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'namaAwal' => 'required|string|max:255',
            'namaAkhir' => 'required|string|max:255',
            'no_telp' => 'required|string|max:255',
        ]);

        $user->update([
            'first_name' => $request->input('namaAwal'),
            'last_name' => $request->input('namaAkhir'),
            'phone_number' => $request->input('no_telp'),
        ]);

        toast('Data Profil Berhasil Disimpan', 'success', 'top-right');

        return redirect()->route('mainprofile')->with('success', 'Profile updated successfully.');
    }

}
