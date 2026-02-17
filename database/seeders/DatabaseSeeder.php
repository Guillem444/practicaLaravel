<?php

namespace Database\Seeders;

use App\Models\Partner;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            TeamsSeeder::class,
            TechnologiesSeeder::class,
            ProjectsSeeder::class,
        ]);

        $p1 = Partner::create(['name' => 'Partner A', 'country' => 'Spain']);
        $p2 = Partner::create(['name' => 'Partner B', 'country' => 'France']);

        Project::first()->update(['partner_id' => $p1->id]);
    }

    
}
