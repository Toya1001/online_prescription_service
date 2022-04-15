<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    private $patientData = [];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $userId = rand(11, 20);
            $patientData[] = [
                'user_id' => $userId,
                'mx_no' => $faker->randomNumber(),
                'trn' =>  $faker->randomNumber(),
                'gender' => $faker->randomElement(['Male', 'Female', 'Other']),
                'dob' => $faker->date(),
                'address' => $faker->streetAddress(),
                'city' => $faker->city(),
                'parish' => $faker->state(),
                'tel_no' => $faker->e164PhoneNumber()

            ];
        }

        foreach ($patientData as $data) {
            Patient::insert($data);
        }
    }
}
