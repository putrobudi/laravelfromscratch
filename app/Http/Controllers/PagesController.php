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

        // notable note for the above:
        // all of facades e.g above is a static interface that proxies to the underlying class. E.g we want to
        // work with caching. But we didn't have to figure out how to construct the cache, you didn't have
        // to request it with dependency injection. You can instead instantly begin using it(using facade).

        // But with small warning:
        // Yes facade is convenient. But be careful that this convenience doesn't end up biting you.
        // And what I mean by this is like this.
        // one big benefit to defining all of the class dependencies within the constructor is that it makes it instantly clear
        // what is required in order for this class to function.
        // However instead when you have these laravel facades sprinkled throughout the class, it blurs things a little bit.

        // For example if this class is three, four hundred lines long. Maybe you're referencing four or five different
        // facades. And when everything starts to get out of hand but you didn't really notice it because it was tucked
        // away into these underlying class methods.

        // sometimes when you're more explicit about you dependencies, it didn't simply becomes clear. You look at the
        // constructor and you think there's five or six or seven different dependencies. There's too much going on here.
        // I probably need to extract a different class or collaborator.
        // Again, defining your dependencies within your constructor helps with that. Whereas tucking them away in various
        // methods makes it more difficult to see what dependencies the class has. So that's definately something to
        // think about.

        // And you'll find when to reach for methods vs when to reach for the underlying classes, it is sort of comes from
        // experience. So for example, laracasts always uses view helper function whether it's facade or the helper function.
        // Same with redirect or Redirect facade. It all just depends on the scope of your project, the convention
        // you're following, and where in this stack you're referencing these classes.
        // E.g on a model level, if I have an eloquen;t model I'd probably not reaching for the Auth facade, or Request
        // facade. Maybe I like referencing the File facade when I need to do quick read from an artisan commands, but if I
        // build a package, I would instead inject it. These are all things that come from experience.
    }

}
