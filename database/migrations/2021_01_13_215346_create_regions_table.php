<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('is_verified_from_us')->nullable();
            $table->unsignedBigInteger('region_type_id');
            $table->unsignedBigInteger('parent_region_id')->nullable();

            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('govern_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('street_id')->nullable();
            $table->tinyInteger('is_country')->nullable();
            $table->tinyInteger('is_govern')->nullable();
            $table->tinyInteger('is_city')->nullable();
            $table->tinyInteger('is_street')->nullable();


            $table->foreign('region_type_id')
                ->references('id')
                ->on('region_types')
                ->onDelete('cascade');


            $table->unsignedBigInteger('created_by_user_id')
                ->nullable();
            $table->foreign('created_by_user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->unsignedBigInteger('updated_by_user_id')
                ->nullable();
            $table->foreign('updated_by_user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->unsignedBigInteger('deleted_by_user_id')
                ->nullable();
            $table->foreign('deleted_by_user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('regions');
    }
}
