<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;

class ProjectTasksController extends Controller
{

    public function store(Project $project)
    {
        $attributes = request()->validate(['name' => 'required','due' => 'required']);
//        dd($attributes);

        $project->addTask($attributes);

        return back();
    }

    public function update(Task $task)
    {
        $task->update([
            'completed' => request()->has('completed')
        ]);

        return back();
    }

}
