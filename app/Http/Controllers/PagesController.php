<?php

namespace App\Http\Controllers;

use App\Models\Example;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;

class PagesController extends Controller
{
    // Automatic Resolution in controller.
    // public function home(Example $example) {
    //   //ddd($example);
    //   // Testing singleton.
    //   ddd(resolve('App\Models\Example'), resolve('App\Models\Example'));
    // }

    public function home() {
      //  return Request::input('name');
      // return View::make('welcome');
      // return File::get(public_path('index.php')); Or Automatic Resolve Dependency by knowing the underlying dependecy in the argument.
      // return $file->get(public_path('index.php'));
      Cache::remember('foo', 60, fn() => 'foobar');

      return Cache::get('foo');
    }
}
