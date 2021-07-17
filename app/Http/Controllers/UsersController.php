<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{

    public function show($username)
    {

        $user = User::where('username', $username)->first();

        return view('users', compact('user'));

    }

}
