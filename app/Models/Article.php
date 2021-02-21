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
}
