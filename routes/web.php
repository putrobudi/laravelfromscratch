<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ArticlesController;
use App\Models\Article;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
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

Route::get('/about', function () {
    //$articles = App\Models\Article::latest(/* 'timestamp', 'updated_at' your choice */)->get(); // order by created_at desc
    //$articles = App\Models\Article::all();
    //$articles = App\Models\Article::take(2)->get();
    //$articles = App\Models\Article::paginate(2);
    //return $articles;
    return view('about', [
        'articles' => App\Models\Article::take(3)->latest()->get()
    ]);
});

Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticlesController::class, 'create']);
Route::post('/articles', [ArticlesController::class, 'store']);
Route::get('/articles/{foobar}', [ArticlesController::class, 'show'])->name('articles.show');
Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit']);
Route::put('/articles/{article}', [ArticlesController::class, 'update']);

Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit']);

Route::get('/contact', function () {
    return view('contact');
});

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