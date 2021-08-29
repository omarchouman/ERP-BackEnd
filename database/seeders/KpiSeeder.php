<?php

namespace Database\Seeders;

use App\Models\Kpi;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class KpiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kpi::factory()
            ->has(Employee::factory()->count(4))
            ->count(6)
            ->create();
    }
}
