<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Company;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get all company IDs
        $companyIds = Company::pluck('id')->toArray();

        // Create 20 fake employees, assigning them to random companies
        for ($i = 0; $i < 20; $i++) {
            Employee::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'company_id' => $faker->randomElement($companyIds),
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
            ]);
        }
    }
}
