<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitinfos', function (Blueprint $table) {
            $table->id();
            $table->double('one_dinar_in_dollar');
            $table->double('taxes_in_kuwait_in_dinar');
            $table->double('taxes_out_kuwait_in_dinar');
            $table->double('one_dollars_in_QAR');
            $table->double('one_dollars_in_SAR');
            $table->double('one_dollars_in_OMR');
            $table->double('one_dollars_in_AED');
            $table->double('one_dollars_in_BHD');
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
        Schema::dropIfExists('sitinfos');
    }
}
