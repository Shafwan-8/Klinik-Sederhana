<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
    
        $this->call([
            UserSeeder::class,
            // PatientSeeder::class,
            // InspectionSedeer::class
        ]);

        // Dokter::create([
        //     'user_id' => 1,
        //     'nama' => 'rafly',
        //     'no_ktp' => '12345678',
        //     'no_hp' => '0810000',
        //     'sip' => 'dsfdjfndfndkjfndjkfnsjd',
        //     'foto' => 'sfsfsdf',
        //     'alamat' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. '
        // ]);
    }
}
