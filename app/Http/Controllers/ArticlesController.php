<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;

class ArticlesController extends Controller
{
    // Renders a list of resource.
    public function index()
    {
        if (request('tag')) {
            // To list only articles with the specified tag.
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            // To list all articles.
            $articles = Article::latest()->get();
        }
        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $foobar)
    {
        // Show a single resource.
        // $article = Article::findOrFail($id);
        // behind the scene of using model variable -> it automatically looks for primary key id.
        // if you don't want to use primary key as an id but different column, then define getRouteKeyName
        // in Article Model.
        // /* quick note: stating a column as a primary key column is not enough for laravel to use that column to find
        // the matching id provided from the uri because laravel still looks inside a column with a name of id.
        // So, for example as laravel automatically look for id column that it thinks as the primary key column by default,
        // you have to tell laravel that column now in my database is flight_id.  */
        // Article::where('id', thepassedId)->first();
        // return $article;
        return view('articles.show', ['article' => $foobar]);
    }

    public function create()
    {
        return view('articles.create', [
            'tags' => Tag::all(),
        ]);
    }

    public function store()
    {
        //dd(request()->all());
        // Article::create($this->validateArticle());
        $this->validateArticle(); // seperate the validation because of tags relationship.
        // $article = new Article($this->validateArticle());
        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1; // auth()->id()
        $article->save();
        /*
        if (request('tags')) or if (request()->has('tags)) only on that condition we proceed attaching.
        But below works because if you attach(null) then, it won't work.
         */
        $article->tags()->attach(request('tags')); // [1,2,3] we're going to attach those id into the table.
        // return redirect('/articles');
        return redirect(route('articles.index'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article)
    {

        $article->update($this->validateArticle());

        // Notice how we still need to specify $article->id?
        // That's because it only works on named route and model binding.
        // return redirect('/articles/' . $article->id);
        // So here also applies how Laravel knows which key to use.
        // In this case it's id because it's set on Article Model.
        //return redirect(route('articles.show', $article));
        return redirect($article->path());
    }

    protected function validateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id', // if tags exists in the tags table particularly the id.
        ]);
    }

    public function destroy()
    {
        // Delete the resource.
    }

}
