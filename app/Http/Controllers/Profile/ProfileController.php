<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.mainprofile');
    }

    public function saveProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'namaAwal' => 'required|string|max:255',
            'namaAkhir' => 'required|string|max:255',
            'no_telp' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5000', // Validasi untuk foto profil
        ]);

        // Hapus gambar profil lama jika ada
        if ($user->avatar) {
            $oldImagePath = public_path('profile-pictures/') . $user->avatar;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Update data pengguna
        $user->update([
            'first_name' => $request->input('namaAwal'),
            'last_name' => $request->input('namaAkhir'),
            'phone_number' => $request->input('no_telp'),
        ]);

        // Cek apakah ada unggahan foto profil
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('profile-pictures'), $imageName);

            // Simpan nama file ke dalam kolom avatar di tabel users
            $user->avatar = $imageName;
            $user->save();
        }

        toast('Data Profil Berhasil Disimpan', 'success', 'top-right');

        return redirect()->route('mainprofile')->with('success', 'Profile updated successfully.');
    }
}
