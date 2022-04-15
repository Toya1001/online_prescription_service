<?php

namespace Database\Seeders;

use App\Models\DrugInventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
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
                'drug_id' => rand(1,30),
                'quantity' => $faker->randomDigit(),
                'batch_no' => $faker->randomDigit(),
                'expiration_date' =>$faker->date()
            ];
        }

        foreach ($drugData as $drug) {
            DrugInventory::insert($drug);
        }
    }
}
