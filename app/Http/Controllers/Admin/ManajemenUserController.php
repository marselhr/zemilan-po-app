<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Storage;
use RahulHaque\Filepond\Facades\Filepond;


class ManajemenUserController extends Controller
{
    public function index()
    {
        $users = User::all();

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
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

    public function update(UpdateUserRequest $request, $user)
    {
        try {
            DB::beginTransaction();

            $user = User::findOrfail($user);

            if ($user->avatar != null) {
                $folder = explode('/', $user->avatar)[0];
                Storage::deleteDirectory('images/' . $folder);
            }
            $f = TemporaryFile::firstOrFail();


            Storage::copy('images/tmp/' . $f->folder . '/' . $f->file, 'images/' . $f->folder . '/' . $f->file);
            $avatar = $f->folder . '/' . $f->file;
            Storage::deleteDirectory('images/tmp/' . $f->folder);
            $f->delete();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone_number = $request->phone_number;
            $user->avatar = $avatar;
            $user->save();

            DB::commit();
            return to_route('admin.user.show', $user)->with('success', 'data berhasil diperbaharui');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with($th->getMessage());
        }
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

            // menampilkan alert success setelah confirmasi disetujui
            toast('Data Pengguna sudah dihapus', 'success', 'top-right');

            return to_route('admin.user.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
