<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        return view('admin.pages.manajemen-user.show', compact('user'));
    }
}
