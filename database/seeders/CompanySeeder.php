<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use Faker\Factory as Faker;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create 20 fake companies
        for ($i = 0; $i < 20; $i++) {
            Company::create([
                'name' => $faker->company,
                'email' => $faker->unique()->safeEmail,
                'logo' => 'logos/default.png', // Replace with actual path or keep default
                'website' => $faker->url,
            ]);
        }
    }
}
