<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    // public function getRouteKeyName()
    // {
    //     return 'slug'; // Article::where('slug', $foobar)->first();
    // }

    protected $fillable = ['title', 'excerpt', 'body'];
    // protected $guarded = []; // Don't guard masses fillable.
    public function path()
    {
        // Automatically knowing which key to use only works in named route
        // And model binding. Not if you define unnamed routes.
        // If using unnamed route, then, you would construct like this:
        //return '/articles/' . $this->id;
        return route('articles.show', $this);
    }
}
