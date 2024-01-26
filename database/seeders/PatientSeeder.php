<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $patients = [
        //     [
        //         'nik_numb' => '1',
        //         'name' => 'nama',
        //         'jk' => 'jk',
        //         'date_birth' => '2',
        //         'address' => 'alamat',
        //         'hp_numb' => '3',
        //         'bpjs_numb' => '4',
        //         'img_ktp' => 'foto ktp',
        //         'email' => 'email',
        //         'job' => 'pekerjaan',
        //         'medicalrecord_numb' => 'pekerjaan',
        //         'img' => 'foto langsung'
        //     ]
        // ];

        // foreach ($patients as $patient) {
        //     Patient::create($patient);
        // }

        // Patient::create([
        //     'nik_numb' => '1',
        //     'name' => 'nama',
        //     'gender' => 'jk',
        //     'date_birth' => '2',
        //     'address' => 'alamat',
        //     'hp_numb' => '3',
        //     'bpjs_numb' => '4',
        //     'img_ktp' => 'foto ktp',
        //     'email' => 'email',
        //     'job' => 'pekerjaan',
        //     'medical_record_numb' => 'pekerjaan',
        // ]);
    }
}
