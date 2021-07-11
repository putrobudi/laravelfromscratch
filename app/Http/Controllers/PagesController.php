<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class PagesController extends Controller
{
    // Automatic Resolution in controller.
    // public function home(Example $example) {
    //   // ddd($example);
    //   // Testing singleton.
    //   ddd(resolve('App\Models\Example'), resolve('App\Models\Example'));
    // }

    public function home()
    {
        //  return Request::input('name');
        // return View::make('welcome');
        // return File::get(public_path('index.php')); Or Automatic Resolve Dependency by knowing the underlying dependecy in the argument.
        // so the above underlying dependency above is like this function home(Filesystem $file)
        // return $file->get(public_path('index.php'));
        Cache::remember('foo', 60, fn() => 'foobar');

        return Cache::get('foo');
    }
}
