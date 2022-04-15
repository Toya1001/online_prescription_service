<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(40)->create();
        
        $this->call(
            [
            DoctorSeeder::class,
            DrugSeeder::class,
            PharmacistSeeder::class,
            PatientSeeder::class,
            InventorySeeder::class,
            PrescriptionSeeder::class,
            MedicalHistorySeeder::class
        ]);
    }
}
