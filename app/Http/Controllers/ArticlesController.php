<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticlesController extends Controller
{
    // Renders a list of resource.
    public function index() {
      return view('articles.index', ['articles' => Article::latest()->get()]);
    }

    public function show(Article $foobar) {
      // Show a single resource.
      // $article = Article::findOrFail($id);
      // behind the scene of using model variable
      // Article::where('id', thepassedId)->first();
      //return $article;
      return view('articles.show', ['article' => $foobar]);
    }

    public function create() {
      // Shows a view to create a new resource.
      return view('articles.create');
    }

    public function store() {
      //persist the new article
      //dump(request()->all());

      // validation
      request()->validate([
        'title' => 'required',
        'excerpt' => 'required',
        'body' => 'required'
      ]);
      //clean up
      $article = new Article();
      $article->title = request('title');
      $article->excerpt = request('excerpt');
      $article->body = request('body');

      $article->save();

      return redirect('/articles');
      
    }

    public function edit(Article $article) {
      // Show a view to edit an existing resource.
      // find the article associated with the id.
      return view('articles.edit', compact('article'));
    }

    public function update(Article $article) {
      // Persist the edited resource.
      request()->validate([
        'title' => 'required',
        'excerpt' => 'required',
        'body' => 'required'
      ]);

      $article->title = request('title');
      $article->excerpt = request('excerpt');
      $article->body = request('body');

      $article->save();

      return redirect('/articles/' . $article->id);
    }

    public function destroy() {
      // Delete the resource.
    }
    


}
