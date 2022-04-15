<?php

namespace Database\Seeders;

use App\Models\Pharmacist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PharmacistSeeder extends Seeder
{
    private $pharmData = [];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $userId = rand(21,30);
            $pharmData[] = [
                'user_id' => $userId,
                'employee_id' => $faker->randomNumber(),
                'license_no'=>Str::random(10),
                'work_name' => $faker->company(),
                'work_address' => $faker->address(),
                
            ];
        }

        foreach ($pharmData as $data) {
            Pharmacist::insert($data);
        }
    }
}
