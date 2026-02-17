<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            [
                'name' => 'Ada Lovelace Lab',
                'country' => 'UK',
                'bio' => 'Equip centrat en sistemes i automatitzacio.',
            ],
            [
                'name' => 'Turing Labs',
                'country' => 'UK',
                'bio' => 'Projectes d enginyeria de programari.',
            ],
            [
                'name' => 'Valencia Dev Team',
                'country' => 'Spain',
                'bio' => 'Equip local de desenvolupament web.',
            ],
            [
                'name' => 'Barcelona Marketing Team',
                'country' => 'Catalunya',
                'bio' => 'Equip local de Marketing.',
            ],
            [
                'name' => 'Batoi Dev Team',
                'country' => 'Pais Valencià',
                'bio' => 'Equip local de desenvolupament web.',
            ],
        ];

        foreach ($teams as $team) {
            Team::query()->create($team);
        }
    }
}
