<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignsToCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_type_id');
            $table->unsignedBigInteger('customer_status_id')->nullable();
            $table->foreign('customer_type_id')
                ->references('id')
                ->on('customer_types')
                ->onDelete('cascade');

            $table->foreign('customer_status_id')
                ->references('id')
                ->on('customer_statuses')
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
        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign('customers_customer_type_id_foreign');
            $table->dropForeign('customers_customer_status_id_foreign');
        });
    }
}
