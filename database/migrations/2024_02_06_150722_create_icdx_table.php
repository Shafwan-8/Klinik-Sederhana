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
        if (!Schema::hasTable('icdx')) {
            Schema::create('icdx', function (Blueprint $table) {
                $table->string('icId', 10)->primary();
                $table->string('icJenisPenyakit', 255);
                $table->string('icNamaLokal', 255)->nullable();
                $table->string('icDTD', 100)->nullable();
                $table->string('icSebabSakit', 255)->nullable();
                $table->string('icKelompok', 20);
                $table->enum('icAktif', ['0', '1'])->default('1');
                $table->string('uCreate', 100)->nullable();
                $table->string('uUpdate', 100)->nullable();
                $table->timestamp('tCreate')->default(DB::raw('current_timestamp()'));
                $table->timestamp('tUpdate')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('icdx');
    }
};
