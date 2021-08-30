<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Omar Chouman',
            'email' => 'omar.chouman0@gmail.com',
            'image' => 'https://avatars.githubusercontent.com/u/72022461?v=4',
            'password' => 'omar123',
        ];
    }
}
