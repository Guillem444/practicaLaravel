<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Team;
use App\Models\Technology;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = Team::query()->pluck('id', 'name');
        $technologies = Technology::query()->pluck('id', 'name');

        $projects = [
            [
                'title' => 'Portal DevOps',
                'publication_year' => 2021,
                'price' => 12.50,
                'stock' => 5,
                'description' => 'Panell per a monitoritzar i desplegar serveis.',
                'is_visible' => true,
                'team_id' => $teams['Ada Lovelace Lab'] ?? null,
                'technologies' => ['DevOps', 'Web'],
            ],
            [
                'title' => 'App de Fichatge',
                'publication_year' => 2020,
                'price' => 9.90,
                'stock' => 3,
                'description' => 'Aplicacio mobil per al control horari.',
                'is_visible' => true,
                'team_id' => $teams['Turing Labs'] ?? null,
                'technologies' => ['Mobile'],
            ],
            [
                'title' => 'Dashboard Comercial',
                'publication_year' => 2022,
                'price' => 11.00,
                'stock' => 2,
                'description' => 'Quadre de comandament per a vendes.',
                'is_visible' => false,
                'team_id' => $teams['Valencia Dev Team'] ?? null,
                'technologies' => ['Web'],
            ],
            [
                'title' => 'Classificador de Tickets',
                'publication_year' => 2023,
                'price' => 14.75,
                'stock' => 8,
                'description' => 'Model AI per a categoritzar incidencies.',
                'is_visible' => true,
                'team_id' => $teams['Ada Lovelace Lab'] ?? null,
                'technologies' => ['AI'],
            ],
            [
                'title' => 'CRM Intern',
                'publication_year' => 2022,
                'price' => 10.50,
                'stock' => 6,
                'description' => 'Gestio de clients i oportunitats comercials.',
                'is_visible' => true,
                'team_id' => $teams['Turing Labs'] ?? null,
                'technologies' => ['Web'],
            ],
            [
                'title' => 'Gestor de Incidencies',
                'publication_year' => 2021,
                'price' => 8.90,
                'stock' => 12,
                'description' => 'Sistema intern per a suport i seguiment.',
                'is_visible' => true,
                'team_id' => $teams['Valencia Dev Team'] ?? null,
                'technologies' => ['Web'],
            ],
            [
                'title' => 'App de Reunions',
                'publication_year' => 2020,
                'price' => 6.40,
                'stock' => 4,
                'description' => 'Agenda i sales amb notificacions.',
                'is_visible' => false,
                'team_id' => $teams['Ada Lovelace Lab'] ?? null,
                'technologies' => ['Mobile'],
            ],
            [
                'title' => 'Analitica de Producte',
                'publication_year' => 2023,
                'price' => 13.20,
                'stock' => 7,
                'description' => 'KPIs i seguiment de l us del producte.',
                'is_visible' => true,
                'team_id' => $teams['Turing Labs'] ?? null,
                'technologies' => ['Web'],
            ],
            [
                'title' => 'Portal de Formacio',
                'publication_year' => 2019,
                'price' => 7.30,
                'stock' => 9,
                'description' => 'Cursos interns i seguiment de progress.',
                'is_visible' => true,
                'team_id' => $teams['Valencia Dev Team'] ?? null,
                'technologies' => ['Web'],
            ],
            [
                'title' => 'Catalog Digital',
                'publication_year' => 2022,
                'price' => 5.60,
                'stock' => 11,
                'description' => 'Cataleg de productes amb cerca rapida.',
                'is_visible' => true,
                'team_id' => $teams['Ada Lovelace Lab'] ?? null,
                'technologies' => ['Web'],
            ],
            [
                'title' => 'Monitor de Servidors',
                'publication_year' => 2021,
                'price' => 9.75,
                'stock' => 10,
                'description' => 'Alertes i estat dels serveis.',
                'is_visible' => false,
                'team_id' => $teams['Turing Labs'] ?? null,
                'technologies' => ['DevOps'],
            ],
            [
                'title' => 'App de Magatzem',
                'publication_year' => 2020,
                'price' => 11.80,
                'stock' => 2,
                'description' => 'Inventari mobil per a magatzem.',
                'is_visible' => true,
                'team_id' => $teams['Valencia Dev Team'] ?? null,
                'technologies' => ['Mobile'],
            ],
            [
                'title' => 'Planificador Sprint',
                'publication_year' => 2024,
                'price' => 15.10,
                'stock' => 5,
                'description' => 'Gestio d iteracions i backlog.',
                'is_visible' => true,
                'team_id' => $teams['Ada Lovelace Lab'] ?? null,
                'technologies' => ['Web'],
            ],
            [
                'title' => 'Recomanador Intern',
                'publication_year' => 2024,
                'price' => 16.25,
                'stock' => 3,
                'description' => 'Motor AI per suggerir recursos.',
                'is_visible' => true,
                'team_id' => $teams['Turing Labs'] ?? null,
                'technologies' => ['AI'],
            ],
            [
                'title' => 'Quadre de Comandament',
                'publication_year' => 2023,
                'price' => 12.20,
                'stock' => 6,
                'description' => 'Vista unificada de KPIs.',
                'is_visible' => true,
                'team_id' => $teams['Valencia Dev Team'] ?? null,
                'technologies' => ['Web'],
            ],
            [
                'title' => 'App de Magatzem',
                'publication_year' => 2020,
                'price' => 11.80,
                'stock' => 2,
                'description' => 'Inventari mobil per a magatzem.',
                'is_visible' => true,
                'team_id' => $teams['Batoi Dev Team'] ?? null,
                'technologies' => ['Mobile'],
            ],
            [
                'title' => 'App de Magatzem',
                'publication_year' => 2020,
                'price' => 11.80,
                'stock' => 2,
                'description' => 'Inventari mobil per a magatzem.',
                'is_visible' => true,
                'team_id' => $teams['Batoi Dev Team'] ?? null,
                'technologies' => ['Mobile'],
            ],
        ];

        foreach ($projects as $data) {
            $technologyNames = $data['technologies'];
            unset($data['technologies']);

            $project = Project::query()->create($data);
            $technologyIds = collect($technologyNames)
                ->map(fn (string $name) => $technologies[$name] ?? null)
                ->filter()
                ->all();

            $project->technologies()->sync($technologyIds);
        }
    }
}
