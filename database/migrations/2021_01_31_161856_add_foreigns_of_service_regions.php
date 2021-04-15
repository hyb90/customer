<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignsOfServiceRegions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_regions', function (Blueprint $table) {
            $table->foreign('service_id')
                ->references('id')->on('services')
                ->onDelete('cascade');
            $table->foreign('region_id')
                ->references('id')->on('regions')
                ->onDelete('cascade');
            $table->foreign('created_by_user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('updated_by_user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('deleted_by_user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_regions', function (Blueprint $table) {
            $table->dropForeign('service_regions_region_id_foreign');
            $table->dropForeign('service_regions_service_id_foreign');
            $table->dropForeign('service_regions_created_by_user_id_foreign');
            $table->dropForeign('service_regions_updated_by_user_id_foreign');
            $table->dropForeign('service_regions_deleted_by_user_id_foreign');
        });
    }
}
