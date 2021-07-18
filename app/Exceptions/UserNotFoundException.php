<?php

namespace App\Exceptions;

use Exception;

// the benefit of using custom exception is more readibility.
class UserNotFoundException extends Exception
{

    // report is for writing something to log file for example.
    public function report()
    {

    }

    public function render($request)
    {
        return response(view('users.notfound2'));
    }

}
