<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignsOfServiceTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_translations', function (Blueprint $table) {

        $table->foreign('service_id')
            ->references('id')->on('services')
            ->onDelete('cascade');
        $table->foreign('translation_lang_id')
            ->references('id')->on('translation_languages')
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
        Schema::table('service_translations', function (Blueprint $table) {
            $table->dropForeign('service_translations_translation_lang_id_foreign');
            $table->dropForeign('service_translations_service_id_foreign');
            $table->dropForeign('service_translations_created_by_user_id_foreign');
            $table->dropForeign('service_translations_updated_by_user_id_foreign');
            $table->dropForeign('service_translations_deleted_by_user_id_foreign');
        });
    }
}
