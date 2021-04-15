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
            $table->id();
            $table->string('username',191);
            $table->string('email',191);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',191);
            $table->rememberToken();
            $table->string('verified',191)->default('0');
            $table->string('verification_token',40)->nullable();
            $table->string('resetpassword_token',40)->nullable();
            $table->string('avatar',191)->nullable();
            $table->string('mobile_phone',191)->nullable();
            $table->string('surname',191)->nullable();
            $table->timestamp('birthdate')->nullable();
            $table->string('gender',191)->nullable();
            $table->text('address')->nullable();
            $table->string('social_security_number',191);
            $table->timestamp('last_active_at')->nullable();

            $table->timestamps();
            $table->softDeletes();


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
