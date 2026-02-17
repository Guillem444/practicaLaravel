<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Policies\ProjectPolicy;
use App\Models\Project;
use App\Models\Team;
use App\Models\Technology;
use Request;

class ProjectController extends Controller
{


    public function index()
{
    $projects = Project::with('team')->paginate(10);
    return view('projects.index', compact('projects'));
}

public function show(Project $project)
{
    $project->load(['team', 'technologies']);
    return view('projects.show', compact('project'));
}

public function create()
{
    $teams = Team::all();
    $technologies = Technology::all();
    $partner = Partner::all();

    return view('projects.create', compact('teams', 'technologies', 'partner'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|min:3',
        'publication_year' => 'required|integer|min:1900',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'description' => 'nullable|string',
        'team_id' => 'required|exists:teams,id', 
        'technologies' => 'array' 
    ]);

    $data = $request->all();
    $data['is_visible'] = $request->has('is_visible'); 

    $project = Project::create($data);

    if ($request->has('technologies')) {
        $project->technologies()->sync($request->technologies);
    }

    return redirect()->route('projects.index')->with('success', 'Projecte creat!');
}

public function edit(Project $project) {
    $this->authorize('update', $project);
}

public function destroy(Project $project) {
    $this->authorize('delete', $project);

    $project->delete();
    return redirect()->route('projects.index')->with('success', 'Eliminat');
}

}