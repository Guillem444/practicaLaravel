<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;

class TechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            ['name' => 'Web'],
            ['name' => 'Mobile'],
            ['name' => 'DevOps'],
            ['name' => 'AI'],
            ['name' => 'Data Science'],
            ['name' => 'Cybersecurity'],
            ['name' => 'Cloud Computing'],
            ['name' => 'Blockchain'],
            ['name' => 'IoT'],
            ['name' => 'AR/VR'],
        ];

        foreach ($technologies as $technology) {
            Technology::query()->create($technology);
        }
    }
}
