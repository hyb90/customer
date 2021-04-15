<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignsOfCustomerVsLabels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_vs_labels', function (Blueprint $table) {
            $table->foreign('customer_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('customer_label_id')
                ->references('id')->on('customer_labels')
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
        Schema::table('customer_vs_labels', function (Blueprint $table) {
            $table->dropForeign('customer_vs_labels_customer_id_foreign');
            $table->dropForeign('customer_vs_labels_customer_label_id_foreign');
            $table->dropForeign('customer_vs_labels_created_by_user_id_foreign');
            $table->dropForeign('customer_vs_labels_updated_by_user_id_foreign');
            $table->dropForeign('customer_vs_labels_deleted_by_user_id_foreign');
        });
    }
}
