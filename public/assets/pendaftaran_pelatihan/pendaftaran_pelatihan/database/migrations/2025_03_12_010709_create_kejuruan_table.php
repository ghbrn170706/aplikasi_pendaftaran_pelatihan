<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('kejuruan', function (Blueprint $table) {
            $table->bigIncrements('kejuaruanID');
            $table->string('nama_kejuruan');
            $table->string('gambar')->nullable(); // Menyimpan nama file gambar
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kejuruan');
    }
};
