<?php

namespace Database\Seeders;

use App\Models\ProjectTeam;
use App\Models\Project;
use App\Models\Team;
use Illuminate\Database\Seeder;

class ProjectTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectTeam::factory()
            ->count(7)
            ->create();
    }
}
