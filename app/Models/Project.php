<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function user() {
      return $this->belongsTo(User::class); // select * from user where project_id = current_project_instance;
    }
}

// $project->user

// hasOne
// hasMany
// belongsTo
// belongsToMany -> pivot tables
// morphMany, morphToMany

