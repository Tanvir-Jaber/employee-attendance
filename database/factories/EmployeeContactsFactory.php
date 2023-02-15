<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeContacts>
 */
class EmployeeContactsFactory extends Factory
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
            'contact_name' => $this->faker->name(),
            'contact_email' => $this->faker->unique()->email,
            'contact_number' => $this->faker->phoneNumber(),
            'employee_id' => $this->faker->unique()->numberBetween(1, $emp->count())
        ];
    }
}
