<?php

namespace App\Http\Controllers;

use App\Exceptions\UserNotFoundException;
use App\Services\UserService;

class UsersController2 extends Controller
{

    public function show($username)
    {

        try {

            $user = (new UserService())->findByUsername($username);

            // So now that we have our custom UserException, let's change this.
        } catch (UserNotFoundException $exception) {
            return view('users.notfound2', ['error' => $exception->getMessage()]);
        }
        return view('users.show', compact('user'));

    }

}
