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

    protected $fillable = ['title', 'excerpt', 'body', 'tags'];
    // protected $guarded = []; // Don't guard masses fillable.
    public function path()
    {
        // Automatically knowing which key to use only works in named route
        // And model binding. Not if you define unnamed routes.
        // If using unnamed route, then, you would construct like this:
        //return '/articles/' . $this->id;
        return route('articles.show', $this);
    }
    public function author() {
    //   return $this->belongsTo(User::class); // Laravel assumes the foreign key is user_id.
      return $this->belongsTo(User::class, 'user_id'); // So if we change the method name, then we need to specify the foreign key.
    }

    public function tags() {
      return $this->belongsToMany(Tag::class)->withTimestamps(); // Maybe because this relationship is mappped in pivot table.
      // so by default it assumes you have no timestamp when attaching.;
      // And why is the timestamp defined here? Not on Tag.php instead? Because the creation of pivot record is 
      // triggered when we're storing new article. That's why we attach the tag to the article.
    }


}

// $article->user

 // an article has many tags
 // tag belongs to an article?

 // Learn Laravel
 // php, laravel, work, education

// So an article can have many tags. And a single tag can have many articles. -> Many to Many