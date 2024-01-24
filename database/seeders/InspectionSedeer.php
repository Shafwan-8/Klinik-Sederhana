<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inspection;

class InspectionSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $no = mt_rand(0001, 9999);
        $rows = ['no_registrasi' => 'INS-' . $no];

        foreach ($rows as $key => $value) {
            Inspection::create([
                $key => $value
            ]);
        }


    }
}
