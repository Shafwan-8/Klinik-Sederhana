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
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreignId('dokter_id')->constrained('dokter')->onDelete('cascade');
            // $table->foreignId('patients_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->string('no_registrasi');

            $table->string('td');
            $table->string('suhu');
            $table->string('nadi');
            $table->string('so2');
            $table->string('pernafasan');
            $table->string('detail');
            $table->string('tb');
            $table->string('bb');
            $table->string('subjektif');
            $table->string('objektif');
            $table->string('assesment');
            $table->string('plan');
            $table->string('diagnosa');
            $table->string('tindakan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspections');
    }
};
