<?php

namespace App\Models;

use Illuminate\Support\Facades\Facade;

class ExampleFacade extends Facade
{
  protected static function getFacadeAccessor() {
    // return 'example';
    return Example::class; // Laravel checks if you've bound the key in container. The key would be something like this: 'App\Models\Example'
    // And because Laravel doesn't find any, it checks whether what you're returning is a class and if Laravel can construct an instance automatically for you.
  }
}
