<?php

namespace Database\Seeders;

use App\Models\MedicalHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicalHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $patientId = rand(1, 10);
            $patientData[] = [
                'patient_id' => $patientId,
                'allergies' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'health_conditions' => $faker-> sentence($nbWords = 3, $variableNbWords = true),
                'pregnant_nursing' => $faker->randomElement(['1','0']),
                ];
        }

        foreach ($patientData as $data) {
            MedicalHistory::insert($data);
        }
    }
}
