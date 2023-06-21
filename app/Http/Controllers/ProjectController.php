<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\Admin\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::visible()->get();
        return view('pages.projects.index', compact('projects'));
    }

    public function indexForEdit()
    {
        $projects = Project::all();
        return view('pages.admin.projects.indexForEdit', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        if( $request->hasFile('image') ){
            $path = Storage::disk('public')->put( 'projects_images', $request->image );
        };

        $slug = Str::slug($request->name);
        
        $form_data = $request->validated();

        $form_data['slug'] = $slug;
        $form_data['image'] = $path;
 
        $new_project = new Project($form_data);
        $new_project->save();
        
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)

    {
        return view('pages.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('pages.admin.projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->validated();

        if( $request->hasFile('image') ){        
            if( $project->image ){
                Storage::delete($project->image);
            }
            $path = Storage::disk('public')->put( 'projects_images', $request->image );
            $form_data['image'] = $path;
        }

        $form_data['slug'] = Str::slug($request->name);

        $project->update($form_data);
        
        return redirect()->route('projects.show', $project)->with('success', "hai modificato l'elemento".$project['name']);
    }

    public function visibility(Project $project) {
        $project->update(['visibility' => !$project->visibility]);

        return redirect()->route('admin.projects.indexForEdit')->with('success', "hai modificato la vidibilità dell'elemento".$project['name']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if( $project->image ){
            Storage::delete($project->image);
            $project->delete();
        }  
        return redirect()->route('admin.projects.indexForEdit');
    }
}
