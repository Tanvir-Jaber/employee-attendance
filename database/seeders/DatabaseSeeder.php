<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Employee::factory(10)->create()
        // ->each(function($emp){
        //     \App\Models\EmployeeDetails::factory(10)->create([
        //         "employee_id" => $emp->id  
        //     ]);
        //     \App\Models\EmployeeContacts::factory(10)->create([
        //         "employee_id" => $emp->id  
        //     ]);
        // });

        // $emp = \App\Models\Employee::factory(10)->create();
        // $emp->each(function ($company) {
        //     $company->empContacts()->save(factory(\App\Models\EmployeeContacts::class)->create(["employee_id" => $emp->id ]));
        // });

        \App\Models\Employee::factory(10)->create()->each(function ($emp) {
            $details = \App\Models\EmployeeDetails::factory()->make();
            $contacts = \App\Models\EmployeeContacts::factory()->make();
            $emp->empDetails()->save($details); 
            $emp->empContacts()->save($contacts); 
        });

        

        
    }
}
