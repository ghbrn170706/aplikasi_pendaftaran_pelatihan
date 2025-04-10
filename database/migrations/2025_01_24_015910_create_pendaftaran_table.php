<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->bigIncrements('pendaftaranID'); // Primary Key
            $table->unsignedBigInteger('userID'); // Menyimpan ID pengguna
            $table->unsignedBigInteger('pelatihanID'); // Menyimpan ID pelatihan
            $table->string('status'); // Status pendaftaran
            $table->date('tanggal_daftar'); // Tanggal pendaftaran
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
        Schema::dropIfExists('pendaftaran');
    }
}
