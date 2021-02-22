<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function articles() {
      return $this->hasMany(Article::class); // select * from articles where user_id = current_user_instance; articles needs user_ide column
    }
    public function projects() {
      return $this->hasMany(Project::class); // select * from projects where user_id = current_user_instance; -//-
    }
}


// $user->articles
// $user->projects

 // $user = User::find(1); // select * from user where id = 1;
 // $user->projects; select * from projects where user_id = user->id
 // query directly above will return collections into projects. Then you
 // can iterate like below
 // $user->projects->first(), $user->projects->last(), $user->projects->find(),
 // $user->projects->split(), $user->projects->groupBy() ...  