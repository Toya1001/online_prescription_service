<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    private $docData = [];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $userId = rand(1,10);
            $docData[] = [
                'user_id'=> $userId,
                'license_no' => Str::random(10),
                'work_name' => Str::random(10),
                'work_address'=> Str::random(30),
               
            ];
        }

        foreach ($docData as $doc) {
            Doctor::insert($doc);
        }
    }
    }

