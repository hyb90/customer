<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->unique()->primary();
            $table->integer('working_hours')->nullable();
            $table->timestamp('start_work_date')->nullable();
            $table->timestamp('end_work_date')->nullable();
            $table->double('salary')->nullable();
            $table->unsignedBigInteger('employee_status_id');
            $table->double('standard_cost_by_hour')->nullable();
            $table->string('current_timezone')->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('employees');
    }
}
