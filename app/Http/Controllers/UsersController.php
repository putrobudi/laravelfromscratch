<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class UsersController extends Controller
{

    public function show($username)
    {

        try {
            // you need firstOrFail instead of just first so that it throws
            // the exception.
            $user = User::where('username', $username)->firstOrFail();
            $user->load(['projects']);
        } catch (ModelNotFoundException $exception) { // this is if user not found
            return view('users.notfound');
        } catch (QueryException $exception) { // this is the user load exception
            // dd($exception->getMessage());
            // get exception class so we can change the catch class to
            // be more specific instead of just \Exception
            // dd(get_class($exception));

            // return view('users.notfound');
            // and then we can return a more specific page like for example
            return view('users.query-exception');
        }
        return view('users.show', compact('user'));

    }

}
