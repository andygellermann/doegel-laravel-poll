<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    // if you know what you do
    // using:
    // protected $guarded = [];
    // then you must do:
    // Task::create(request(['name','due','priority']));
    // ...for security reasons in your Controller Create-Method!

    // protected $fillable = ['name', 'project_id', 'due', 'priority'];

//    protected $guarded = [];
    protected $fillable = ['name', 'project_id', 'due', 'priority'];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
