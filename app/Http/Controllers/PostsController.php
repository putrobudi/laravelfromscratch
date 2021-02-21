<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
//use DB;
use App\Models\Post;

class PostsController extends Controller
{
  public function show($slug)
  {
    // $posts = [
    //   'my-first-post' => 'Hello, this is my first blog post!',
    //   'my-second-post' => 'Now I am getting the hang of this blogging thing'
    // ];
    // QueryBuilder, clean and safe API to construct SQL Queries.
    // There is a cleaner way using the same API called Eloquent.
    //$post = DB::table('posts')->where('slug', $slug)->first();
    //$post = Post::where('slug', $slug)->first();
    // you don't need the abort if below using this line.
    $post = Post::where('slug', $slug)->firstOrFail();

    // if (!$post) {
    //   abort(404);
    // }

    // if (!array_key_exists($post, $posts)) {
    //   abort(404, 'Sorry, that post was not found.');
    // }

    return view('posts', [
      //'post' => $posts[$post]
      'post' => $post
    ]);

    // Not recommended to handle not found like this
    // return view('posts', [
    //     'post' => $posts[$post] ?? 'Nothing here yet.'
    // ]);
  }
}
