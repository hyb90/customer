<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('address_details');
            $table->string('delivered_to_person_name');
            $table->string('delivered_to_person_address');
            $table->string('delivered_to_person_mobile');
            $table->string('postal_code');
            $table->double('total_price');
            $table->double('shipping_cost');
            $table->integer('shipping_rating');
            $table->tinyInteger('free_shipping')->default(0);
            $table->tinyInteger('is_payment_done')->default(0);
            $table->unsignedBigInteger('delivered_to_person_region_id');
            //$table->foreign('delivered_to_person_region_id')
            //    ->references('id')
            //    ->on('regions')
            //    ->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            //$table->foreign('user_id')
            //    ->references('id')
            //    ->on('users')
            //    ->onDelete('cascade');
            $table->unsignedBigInteger('shipping_company_in_region_id');
            //$table->foreign('shipping_company_in_region_id')
            //    ->references('id')
            //    ->on('shipping_company_in_regions')
            //    ->onDelete('cascade');
            $table->unsignedBigInteger('service_id');
            //$table->foreign('service_id')
            //    ->references('id')
            //    ->on('services')
            //    ->onDelete('cascade');
            $table->unsignedBigInteger('customer_address_id');
           // $table->foreign('customer_address_id')
           //     ->references('id')
           //     ->on('customer_addresses')
           //     ->onDelete('cascade');
            $table->unsignedBigInteger('order_type_id');
            $table->foreign('order_type_id')
                ->references('id')
                ->on('order_types')
                ->onDelete('cascade');
            $table->unsignedBigInteger('currency_id');
            //$table->foreign('currency_id')
            //    ->references('id')
            //    ->on('currencies')
            //    ->onDelete('cascade');
            $table->string('description');
            $table->date('shipping_date');
            $table->unsignedBigInteger('order_status_id');
            $table->foreign('order_status_id')
                ->references('id')
                ->on('order_statuses')
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
        Schema::dropIfExists('orders');
    }
}
