<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    // if I want to fetch all articles that belongs to a tag
    public function articles() {
      return $this->belongsToMany(Article::class); 
    }
}
