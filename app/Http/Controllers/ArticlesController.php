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
      // behind the scene of using model variable -> it automatically looks for primary key id.
      // if you don't want to use primary key as an id but different column, then define getRouteKeyName
      // in Article Model.
      // Article::where('id', thepassedId)->first();
      //return $article;
      return view('articles.show', ['article' => $foobar]);
    }

    public function create() {
      return view('articles.create');
    }

    public function store() {
      Article::create($this->validateArticle());
      // return redirect('/articles');
      return redirect(route('articles.index'));
    }

    public function edit(Article $article) {
      return view('articles.edit', compact('article'));
    }

    public function update(Article $article) {

      $article->update($this->validateArticle());

      // Notice how we still need to specify $article->id?
      // That's because it only works on named route and model binding.
      // return redirect('/articles/' . $article->id);
      // So here also applies how Laravel knows which key to use.
      // In this case it's id because it's set on Article Model.
      //return redirect(route('articles.show', $article));
      return redirect($article->path());
    }

    protected function validateArticle() {
      return request()->validate([
        'title' => 'required',
        'excerpt' => 'required',
        'body' => 'required'
      ]);
    }

    public function destroy() {
      // Delete the resource.
    }
    


}
