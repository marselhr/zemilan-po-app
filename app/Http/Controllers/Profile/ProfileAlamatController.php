<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Http;


class ProfileAlamatController extends Controller
{
    public function index(Request $request)
    {
        $content = view('profile.tab_content.address')->render();
        return response()->json([
            'status' => true,
            'content' => $content
        ]);
    }
    public function getCitiesByProvince(Request $request, $provinceId)
    {
        $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/{$provinceId}.json");

        if ($response->successful()) {
            $cities = $response->json();
            return response()->json($cities);
        }

        return response()->json(['error' => 'Gagal mengambil data kota.']);
    }

    public function saveAlamat(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'selectedProvinsiName' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kodePos' => 'required|string|max:255',
            'detail' => 'required|string|max:255',
        ]);

        // Simpan data alamat ke dalam tabel
        if ($user->address == null) {
            UserAddress::create([
                'user_id' => $user->id,
                'province' => $request->input('selectedProvinsiName'),
                'city' => $request->input('kota'),
                'post_code' => $request->input('kodePos'),
                'detail' => $request->input('detail'),
            ]);
        } else {
            $user->address()->update([
                'province' => $request->input('selectedProvinsiName'),
                'city' => $request->input('kota'),
                'post_code' => $request->input('kodePos'),
                'detail' => $request->input('detail'),
            ]);
        }

        toast('Data Alamat Berhasil Disimpan', 'success', 'top-right');

        return redirect()->route('mainprofile')->with('success', 'Alamat berhasil diperbarui.');
    }
}
