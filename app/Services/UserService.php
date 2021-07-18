<?php

namespace App\Services;

use App\Exceptions\UserNotFoundException;
use App\Models\User;

class UserService
{

    public function findByUsername($username)
    {

        // why we're not using firstOrFail here? Because we're going
        // to create our custom throwable message. We can still
        // use the default throwable message, but we can add more to it.
        $user = User::where('username', $username)->first();

        if (!$user) {

            // throw new ModelNotFoundException('Use is not found by username ' . $username);
            throw new UserNotFoundException('Use is not found by username ' . $username);

        }

        return $user;

    }

}
