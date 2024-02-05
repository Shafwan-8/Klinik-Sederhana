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
        Inspection::factory(5)->create();

    }
}
