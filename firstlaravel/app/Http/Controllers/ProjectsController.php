<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Events\ProjectCreated;
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
//        return view('projects.index', [
//            // get all projects of authenticated user
//            'projects' => auth()->user()->projects
//        ]);
        $projects = Project::where('owner_id', auth()->id())->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $attributes = $this->validateProject();
        $attributes['owner_id'] = auth()->id();
        $project = Project::create($attributes);
        return redirect('/projects');
    }

    public function show(Project $project)
    {
        /*
         * auth-check method called below you find in Policies/ProjectPolicy.php
         * Create Policy by using model-Template?
         * php artisan make:policy ProjectPolice --model=Project
         * --model= create a Policy for a Model by "Boilerplate"
         * */
//        $this->authorize('update', $project);
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
//        $this->authorize('update', $project);
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $project->update($this->validateProject());
        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
//        $this->authorize('update', $project);
        $project->delete();
        return redirect('/projects');
    }

    public function validateProject()
    {
        return request()->validate([
            'title' => ['required', 'min:5', 'max:64'],
            'description' => ['required','min:10']
        ]);
    }
}
