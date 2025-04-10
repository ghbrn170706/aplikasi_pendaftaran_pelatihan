    <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('sertifikats', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama penerima sertifikat
            $table->string('email'); // Email penerima sertifikat
            $table->string('pelatihan'); // Nama pelatihan
            $table->date('tanggal'); // Tanggal sertifikat
            $table->string('background_image')->nullable(); // Background sertifikat (opsional)
            $table->string('logo_penyelenggara')->nullable(); // Logo penyelenggara (opsional)
            $table->string('peran')->nullable(); // Peran penyelenggara (opsional)
            $table->string('nama_penyelenggara')->nullable(); // Nama penyelenggara (opsional)
            $table->string('tanda_tangan_ketua')->nullable(); // Tanda tangan ketua penyelenggara (opsional)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('sertifikats');
    }
};
