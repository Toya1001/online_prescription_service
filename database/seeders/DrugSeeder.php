<?php

namespace Database\Seeders;

use App\Models\Drug;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DrugSeeder extends Seeder
{
    private $drugData = [];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 30; $i++) {
            $drugData[] = [
                'drug_name' => $faker->name(),
                'generic_name' => $faker->name(),
                'description' => $faker->sentence($nbWords = 5, $variableNbWords = true),
            ];
        }

        foreach ($drugData as $drug) {
            Drug::insert($drug);
        }
    }
}
