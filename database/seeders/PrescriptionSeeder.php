<?php

namespace Database\Seeders;

use App\Models\Prescription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrescriptionSeeder extends Seeder
{
    private $prescriptData = [];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $patientId = rand(1, 10);
            $patientData[] = [
                'patient_id' => $patientId,
                'doctor_id' =>  rand(1, 10),
                'drug_id' =>  rand(1, 20),
                'dosage' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'quantity' => $faker->randomDigit(),
                'directions' =>  $faker->sentence($nbWords = 6, $variableNbWords = true),
                'duration' => $faker->numberBetween(30,60),
                'repeat' => $faker->randomNumber(1,6),
            ];
        }

        foreach ($patientData as $data) {
            Prescription::insert($data);
        }
    }
}
