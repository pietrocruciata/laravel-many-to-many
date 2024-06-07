<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Validation\Rule;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = Technology::all();
        $types = Type::all();
        return view('admin.projects.create', compact('types'),compact('technologies'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

      $form_data = $request->validated();
        

        $form_data = $request->all();

        $slug = Str::slug($form_data['name']);
        $form_data['slug'] = $slug;

        $new_project = Project::create($form_data);

        

        return to_route('admin.projects.show', $new_project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $technologies = Technology::all();

        return view('admin.projects.show',compact('project'),compact('technologies'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {

        $types = Type::all();
        $technologies = Technology::all();

      
        return view('admin.projects.edit', compact('project','types','technologies'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->validated();
        
        $form_data = $request->all();

        $project->fill($form_data);

        $project->save();

        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        } else {
            
            $project->technologies()->detach();
            
        }

        return view('admin.projects.show', compact('project')) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return to_route('admin.projects.index');
    }
}
