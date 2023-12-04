<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class ChangePassword extends Controller
{
    public function index()
    {
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
        toast('Terjadi Error, Silakhan Cek Kembali ', 'success', 'top-right');
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Logic to update the password if validation passes
    $user = $request->user();
    $user->password = \Hash::make($request->input('passwordBaru'));
    $user->save();

    toast('Password Berhasil Diubah', 'success', 'top-right');
    return redirect()->route('changePW')->with('success', 'Password updated successfully.');
}
}
