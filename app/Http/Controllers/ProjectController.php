<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Policies\ProjectPolicy;
use App\Models\Project;
use App\Models\Team;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate; // Importar arriba

class ProjectController extends Controller
{

    use AuthorizesRequests;
   public function index()
{
    $projects = Project::with(['team', 'partner', 'technologies'])->paginate(10);
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
    // Validación
    $request->validate([
        'title' => 'required|min:3',
        'publication_year' => 'required|integer|min:1900',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'team_id' => 'required|exists:teams,id',
        'partner_id' => 'nullable|exists:partners,id', // Validar partner
        'technologies' => 'array'
    ]);

    $project = Project::create($request->all());

    // Guardar checkbox booleano
    $project->is_visible = $request->has('is_visible');
    $project->save();

    // Sincronizar tecnologías (Many to Many)
    if ($request->has('technologies')) {
        $project->technologies()->sync($request->technologies);
    }

    return redirect()->route('projects.index')->with('success', 'Creat correctament');
}

public function edit(Project $project)
{
    $teams = Team::all();
    $technologies = Technology::all();
    $partners = Partner::all();
    return view('projects.edit', compact('project', 'teams', 'technologies', 'partners'));
}

public function update(Request $request, Project $project)
{
   $request->validate([
        'title' => 'required|min:3',
        'publication_year' => 'required|integer|min:1900',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'team_id' => 'required|exists:teams,id',
        'partner_id' => 'nullable|exists:partners,id', 
        'technologies' => 'array'
    ]);

    $project->update($request->all());

    $project->is_visible = $request->has('is_visible');
    $project->save();

    $project->technologies()->sync($request->input('technologies', []));

    return redirect()->route('projects.index')->with('success', 'Actualitzat');
}

public function destroy(Project $project) {
    $this->authorize('delete', $project);
    $project->delete();
    return redirect()->route('projects.index')->with('success', 'Eliminat');
}

}