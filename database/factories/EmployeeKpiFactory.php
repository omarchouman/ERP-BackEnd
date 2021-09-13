<?php

namespace Database\Factories;

use App\Models\EmployeeKpi;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeKpiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeKpi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => '1',
            'kpi_id' => '1',
            'level' => $this->faker->number()->min(1)->max(10),
        ];
    }
}
