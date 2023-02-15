<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeDetails>
 */
class EmployeeDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $emp = \App\Models\Employee::all();
       
        return [
            "address" => $this->faker->address(),
            'employee_id' => $this->faker->unique()->numberBetween(1, $emp->count())
        ];
    }
}
