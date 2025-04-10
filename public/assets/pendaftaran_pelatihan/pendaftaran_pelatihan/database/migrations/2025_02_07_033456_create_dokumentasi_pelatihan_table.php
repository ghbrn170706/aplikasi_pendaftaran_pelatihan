<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumentasiPelatihanTable extends Migration
{
    public function up()
    {
        Schema::create('dokumentasi_pelatihan', function (Blueprint $table) {
            $table->id('dokumentasiID');
            $table->string('judul_pelatihan');
            $table->text('deskripsi')->nullable();
            $table->string('gambar'); // Menyimpan nama file gambar
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokumentasi_pelatihan');
    }
}
