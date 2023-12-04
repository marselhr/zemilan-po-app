<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class ChangePassword extends Controller
{
    public function index()
    {
        session(['previous_url' => url()->previous()]);
        return view('changePW.changePW');
    }

    public function updatePassword(Request $request)
{
    $validator = Validator::make($request->all(), [
        'passwordlamaform' => [
            'required',
            function ($attribute, $value, $fail) use ($request) {
                // Check if the provided passwordlamaform matches the user's current password
                if (!\Hash::check($value, $request->user()->password)) {
                    $fail('The current password is incorrect.');
                }
            },
        ],
        'passwordBaru' => 'required|min:8',
    ]);

    if ($validator->fails()) {
        toast('Terjadi Error, Silahkan Cek Kembali ', 'success', 'top-right');
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Logic to update the password if validation passes
    $user = $request->user();
    $user->password = \Hash::make($request->input('passwordBaru'));
    $user->save();

    toast('Password Berhasil Diubah', 'success', 'top-right');

    // Ambil URL sebelumnya dari sesi
    $previousUrl = session('previous_url', route('home'));

    // Hapus URL sebelumnya dari sesi
    session()->forget('previous_url');

    return redirect($previousUrl)->with('success', 'Password updated successfully.');
}

}
