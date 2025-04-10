<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelatihanOfflineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelatihan_offline', function (Blueprint $table) {
            // Primary key for the table
            $table->bigIncrements('pelatihanofflineID'); 

            // Name of the training
            $table->string('nama_pelatihan'); 

            // Description of the training
            $table->text('deskripsi'); 

            // Type of training (only 'offline' in this case)
            $table->enum('jenis', ['offline']); 

            // Start date of the training
            $table->date('jadwal_mulai'); 

            // End date of the training
            $table->date('jadwal_selesai'); 

            // Location of the training (nullable in case no location is provided)
            $table->string('lokasi')->nullable(); 

            // Capacity for the training
            $table->integer('kapasitas'); 

            // Price of the training
            $table->decimal('harga', 10, 2); 

            // Image of the training (nullable in case no image is provided)
            $table->string('foto_pelatihan')->nullable(); 

            // Timestamps for created_at and updated_at
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
        // Drop the pelatihan_offline table if the migration is rolled back
        Schema::dropIfExists('pelatihan_offline');
    }
}
