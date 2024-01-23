<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('nik_numb')->unique();
            $table->string('name');
            $table->string('jk');
            $table->string('date_birth');
            $table->string('address');
            $table->string('hp_numb');
            $table->string('bpjs_numb')->unique();
            $table->string('img_ktp');
            $table->string('email');
            $table->string('pekerjaan');
            $table->string('medicalrecord_numb')->unique();
            $table->string('img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
