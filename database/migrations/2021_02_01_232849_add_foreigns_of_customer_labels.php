<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignsOfCustomerLabels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_labels', function (Blueprint $table) {
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
        Schema::table('customer_labels', function (Blueprint $table) {
            $table->dropForeign('customer_labels_created_by_user_id_foreign');
            $table->dropForeign('customer_labels_updated_by_user_id_foreign');
            $table->dropForeign('customer_labels_deleted_by_user_id_foreign');
        });
    }
}
