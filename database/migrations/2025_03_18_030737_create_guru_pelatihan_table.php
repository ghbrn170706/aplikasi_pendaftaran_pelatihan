<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruPelatihanTable extends Migration
{
    public function up()
    {
        Schema::create('guru_pelatihan', function (Blueprint $table) {
            $table->bigIncrements('gurupelatihanID');
            $table->string('gambar')->nullable(); // Path gambar, nullable jika tidak wajib
            $table->string('nama');
            $table->string('jurusan');
            $table->text('deskripsi_perjalanan_hidup');
            $table->string('spesialisasi_guru'); // Mengubah nama kolom untuk lebih jelas
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guru_pelatihan');
    }
}
