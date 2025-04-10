<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelatihanOnlineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelatihan_online', function (Blueprint $table) {
            $table->bigIncrements('pelatihanonlineID');
            $table->string('nama_pelatihan');
            $table->text('deskripsi')->nullable(); // Allow null values for deskripsi
            $table->enum('jenis', ['online']);
            $table->date('jadwal_mulai');
            $table->date('jadwal_selesai');
            $table->integer('kapasitas');
            $table->decimal('harga', 10, 2);
            $table->string('link_zoom')->nullable();
            $table->string('foto_pelatihan')->nullable(); // Menambahkan kolom untuk gambar
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
        Schema::dropIfExists('pelatihan_online');
    }
}
