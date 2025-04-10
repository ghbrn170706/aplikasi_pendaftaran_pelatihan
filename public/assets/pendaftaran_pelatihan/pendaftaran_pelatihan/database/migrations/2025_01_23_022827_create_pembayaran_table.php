<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->bigIncrements('pembayaranID');
            $table->unsignedBigInteger('pelatihanID'); // Foreign key to pelatihan table
            $table->unsignedBigInteger('userID'); // Foreign key to users table
            $table->date('tanggal_bayar');
            $table->decimal('jumlah_bayar', 15, 2);
            $table->string('bukti_bayar')->nullable(); // Bukti pembayaran (opsional)
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('pelatihanID')->references('pelatihanID')->on('pelatihan')->onDelete('cascade');
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
        });            }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}