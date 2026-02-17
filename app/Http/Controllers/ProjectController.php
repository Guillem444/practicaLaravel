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
    $project->load(['team', 'technologies', 'partner']);
    return view('projects.show', compact('project'));
}

public function create()
{
    $teams = Team::all();
    $technologies = Technology::all();
    $partners = Partner::all();

    return view('projects.create', compact('teams', 'technologies', 'partners'));
}

public function store(Request $request)
    {
        // 1. Validar
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'publication_year' => 'required|integer|min:1900',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'team_id' => 'required|exists:teams,id',
            'partner_id' => 'nullable|exists:partners,id', // Puede ser null
            'technologies' => 'array', // Debe ser una lista
            'technologies.*' => 'exists:technologies,id' // Cada item debe existir
        ]);

        // 2. Preparar datos
        $data = $request->all();
        // Checkbox: Si está marcado es true, si no, false
        $data['is_visible'] = $request->has('is_visible');

        // 3. Crear
        $project = Project::create($data);

        // 4. Relaciones Muchos a Muchos (Sync)
        // Si no se seleccionó ninguna tecnología, pasamos un array vacío []
        $project->technologies()->sync($request->input('technologies', []));

        return redirect()->route('projects.index')->with('success', 'Projecte creat correctament!');
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
        // 1. Validar (Igual que store)
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'publication_year' => 'required|integer|min:1900',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'team_id' => 'required|exists:teams,id',
            'partner_id' => 'nullable|exists:partners,id',
            'technologies' => 'array',
        ]);

        // 2. Actualizar datos
        $data = $request->all();
        $data['is_visible'] = $request->has('is_visible');
        
        $project->update($data);

        // 3. Sync de tecnologías
        $project->technologies()->sync($request->input('technologies', []));

        return redirect()->route('projects.index')->with('success', 'Projecte actualitzat correctament!');
    }

public function destroy(Project $project) {
    $this->authorize('delete', $project);
    $project->delete();
    return redirect()->route('projects.index')->with('success', 'Eliminat');
}

}