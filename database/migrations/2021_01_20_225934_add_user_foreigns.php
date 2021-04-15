<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserForeigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('default_lang_id');
            $table->foreign('default_lang_id')
                ->references('id')->on('translation_languages')
                ->onDelete('cascade');

            $table->unsignedBigInteger('role_id')
                ->nullable();
            $table->foreign('role_id')
                ->references('id')->on('roles')
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_default_lang_id_foreign');
            $table->dropColumn('default_lang_id');
            $table->dropForeign('users_role_id_foreign');
            $table->dropColumn('role_id');
            $table->dropForeign('users_created_by_user_id_foreign');
            $table->dropColumn('created_by_user_id');
            $table->dropForeign('users_updated_by_user_id_foreign');
            $table->dropColumn('updated_by_user_id');
            $table->dropForeign('users_deleted_by_user_id_foreign');
            $table->dropColumn('deleted_by_user_id');
        });
    }
}
