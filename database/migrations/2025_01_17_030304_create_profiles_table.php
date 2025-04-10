<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('profileID'); // Create profileID as the primary key
            $table->unsignedBigInteger('user_id'); // Create user_id as a foreign key to the users table
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tanggal_lahir');
            $table->string('nik')->unique();
            $table->string('email')->unique();
            $table->string('nomor_hp');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('desa');
            $table->enum('pekerjaan', ['bekerja', 'tidak bekerja', 'mahasiswa']);
            $table->string('gambar')->nullable();
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
