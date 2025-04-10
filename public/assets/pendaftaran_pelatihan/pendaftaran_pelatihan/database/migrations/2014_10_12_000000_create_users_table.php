
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('alamat')->nullable();  // Membuat alamat nullable
            $table->string('no_hp')->nullable();   // Membuat no_hp nullable
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'user']);
            $table->string('otp')->nullable();
            $table->boolean('otp_verified')->default(false);
            $table->string('otp_token', 60)->nullable();
            $table->timestamp('otp_expired_at')->nullable();
            $table->string('google_id')->unique()->nullable();
            $table->string('google_token')->nullable();
            $table->string('refresh_token')->nullable();
            $table->boolean('blocked')->default(false);
         
            $table->string('token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
