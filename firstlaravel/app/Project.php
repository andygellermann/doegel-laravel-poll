<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    // if you know what you do
    // using:
    // protected $guarded = [];
    // then you must do:
    // Project::create(request(['title','description']));
    // ...for security reasons in your Controller Create-Method!

    protected $fillable = ['title', 'description'];

}
