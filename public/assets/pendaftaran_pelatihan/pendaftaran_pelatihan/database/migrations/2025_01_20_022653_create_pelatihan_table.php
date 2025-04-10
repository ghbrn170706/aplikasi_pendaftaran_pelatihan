<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelatihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelatihan', function (Blueprint $table) {
            $table->bigIncrements('pelatihanID');
            $table->string('nama_pelatihan');
            $table->text('deskripsi');
            $table->enum('jenis', ['online', 'offline']);
            $table->date('jadwal_mulai');
            $table->date('jadwal_selesai');
            $table->string('lokasi')->nullable();
            $table->integer('kapasitas');
            $table->decimal('harga', 10, 2);
            $table->string('link_zoom')->nullable();
            $table->string('foto_pelatihan')->nullable();
            
            // Kolom tambahan sesuai permintaan
            $table->text('sertifikat'); 
            $table->text('level'); 
            $table->text('kategori'); 
            $table->string('gambar_pelatihan'); 
            $table->text('sub_judul'); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelatihan');
    }
}
