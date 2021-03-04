<?php

namespace App\Http\Controllers;

use App\Models\Example;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Automatic Resolution in controller.
    public function home(Example $example) {
      //ddd($example);
      // Testing singleton.
      ddd(resolve('App\Models\Example'), resolve('App\Models\Example'));
    }
}
