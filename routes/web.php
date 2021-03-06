<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PagesController;
use App\Models\Article;


/* From service provider fundamentals */
// Route::get('/', function () {

//     // this logic should be written in Service Provider.
//     $container = new \App\Models\Container();
//     $container->bind('example', function () {
//         return new \App\Models\Example();
//     });

//     $example = $container->resolve('example');

//     // ddd($example);
//     $example->go();
// });

/* End from Service Provider Fundamentals */

/* From Automatically Resolve Dependencies */
/* Version 1 */
// app()->bind('example', function () {
//     $foo = config('services.foo'); // find this inside config dir
//     return new \App\Models\Example($foo); // read the config file
// });

// Route::get('/', function () {
//     $example = resolve('example');
//     ddd($example);
// });

/* Version 2 */
// when we omit this, the resolve function that doesn't contain key below still works.
// app()->bind('example', function () {
//     return new \App\Models\Example();
// });

// Route::get('/', function () {
//     // $example = resolve('example');
//     // $example = app()->make(App\Models\Example::class); // You could also write resolve this way.
//     $example = resolve(App\Models\Example::class); // Laravel checks if there's an existing class to resolve.

//     ddd($example);
// });

/* Version 3 */
// This also works like version 2.
// This is called Automatic Resolution, if Laravel can do it.
// Route::get('/', function (App\Models\Example $example) {
//     ddd($example);
// });

// Using controller instead of route closure.
//Route::get('/', 'App\Http\Controllers\PagesController@home');

/* Version 4 when Laravel doesn't know what $foo is inside Example constructor. */
// You need to explicitly tell Laravel
// Then we move this into AppServiceProvider.php to register it.
// app()->bind('App\Models\Example', function () {
//     $collaborator = new \App\Models\Collaborator();
//     $foo = 'foobar';

//     return new \App\Models\Example($collaborator, $foo);
// });
Route::get('/', [PagesController::class, 'home']);


Route::get('/about', function () {
    //$articles = App\Models\Article::latest(/* 'timestamp', 'updated_at' your choice */)->get(); // order by created_at desc
    //$articles = App\Models\Article::all();
    //$articles = App\Models\Article::take(2)->get();
    //$articles = App\Models\Article::paginate(2);
    //return $articles;
    return view('about', [
        'articles' => Article::take(3)->latest()->get()
    ]);
});

Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticlesController::class, 'create']);
Route::post('/articles', [ArticlesController::class, 'store']);
Route::get('/articles/{foobar}', [ArticlesController::class, 'show'])->name('articles.show');
Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit']);
Route::put('/articles/{article}', [ArticlesController::class, 'update']);

Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit']);

// Route::get('/contact', function () {
//     return view('contact');
// });

Route::get('/contact', [ContactController::class, 'show']);
Route::post('/contact', [ContactController::class, 'store']);

Route::get('test', function () {
    // return view('test', ['name' => 'Putro']);
    return var_dump(request('name'));
});

Route::get('/posts/{post}', [PostsController::class, 'show']);


// GET /articles
// GET /articles/:id
// POST /articles
// PUT /articles/:id
// DELETE /articles/:id

// GET /videos
// GET /videos/create
// POST /videos
// GET /videos/2
// GET /videos/2/edit
// PUT /videos/2
// DELETE /videos/2

// GET /videos/subscribe
// POST /videos/subscriptions => VideoSubscriptionsController@store