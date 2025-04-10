<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendapat_anggota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('foto')->nullable();
            $table->string('nama_anggota');
            $table->string('posisi_sebagai');
            $table->string('jabatan_pekerjaan');
            $table->timestamps();
          
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendapat_anggota');
    }
};
