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
        Schema::create('mails', function (Blueprint $table) {
            $table->id('id');
            $table->uuid('uuid');
            $table->integer('type_id');
            $table->string('nomor_surat');
            $table->string('departemen')->nullable();
            $table->string('nama');
            $table->string('nik')->nullable();
            $table->string('umur')->nullable();
            $table->string('jk')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('lama_hari')->nullable();
            $table->string('tanggal_mulai')->nullable();
            $table->string('tanggal_selesai')->nullable();
            $table->string('catatan')->nullable();
            $table->string('lokasi');
            $table->string('tanggal');
            $table->string('pengirim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mails');
    }
};
