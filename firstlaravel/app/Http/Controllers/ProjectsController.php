<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Project;
use Illuminate\Http\Request;

// IMPORTANT: automate your creation and SAFE your time!!!
// php artisan make:controller ProjectsController -r -m Project
// creates a ProjectsController and Project-Model from my resource!!!

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::where('owner_id',auth()->id())->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:5', 'max:64'],
            'description' => ['required','min:10']
        ]);
        $attributes['owner_id'] = auth()->id();

        Project::create($attributes);

        return redirect('/projects');
    }

    public function show(Project $project)
    {
        /*
         * Following auth-check method find in Policies/ProjectPolicy.php
         * Create Policy by using model-Template?
         * php artisan make:policy ProjectPolica --model=Project
         * */
        $this->authorize('view', $project);
//        abort_if($project->owner_id !== auth()->id(), 403);
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
//        $this->authorize('update', $project);
        abort_if($project->owner_id !== auth()->id(), 403);
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $project->update(request()->validate([
            'title' => ['required', 'min:5', 'max:64'],
            'description' => ['required','min:10']
        ]));
        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/projects');
    }
}
