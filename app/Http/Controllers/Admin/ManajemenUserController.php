<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use Illuminate\Support\Facades\DB;

class ManajemenUserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.pages.manajemen-user.index', compact('users'));
    }

    public function show($user)
    {
        $user = User::findOrFail($user);
        return view('admin.pages.manajemen-user.show-detail.detail', compact('user'));
    }

    public function edit($user)
    {
        $user = User::findOrFail($user);
        return view('admin.pages.manajemen-user.show-detail.edit', compact('user'));
    }
    public function invoice($user)
    {
        $user = User::findOrFail($user);
        return view('admin.pages.manajemen-user.show-detail.invoice', compact('user'));
    }

    public function destroy($user)

    {
        try {
            DB::beginTransaction();
            $user = User::findOrFail($user);
            $user->delete();
            DB::commit();
            return to_route('admin.user.index')->with('success', "data user sudah dihapus");
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
