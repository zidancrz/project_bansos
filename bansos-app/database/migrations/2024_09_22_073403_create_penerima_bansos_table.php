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
        Schema::create('penerima_bansos', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->string('no_kk');
            $table->string('foto_ktp')->nullable();
            $table->string('foto_kk')->nullable();
            $table->integer('umur');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('provinsi');
            $table->string('kab_kota');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->decimal('penghasilan_sebelum', 15, 2);
            $table->decimal('penghasilan_setelah', 15, 2);
            $table->string('alasan');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerima_bansos');
    }
};
