<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignsOfEmployeeVsLabels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_vs_labels', function (Blueprint $table) {
            $table->foreign('employee_id')
                ->references('user_id')->on('employees')
                ->onDelete('cascade');

            $table->foreign('employee_label_id')
                ->references('id')->on('employee_labels')
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
        Schema::table('employee_vs_labels', function (Blueprint $table) {
            $table->dropForeign('employee_vs_labels_employee_id_foreign');
            $table->dropForeign('employee_vs_labels_employee_label_id_foreign');
            $table->dropForeign('employee_vs_labels_created_by_user_id_foreign');
            $table->dropForeign('employee_vs_labels_updated_by_user_id_foreign');
            $table->dropForeign('employee_vs_labels_deleted_by_user_id_foreign');
        });
    }
}
