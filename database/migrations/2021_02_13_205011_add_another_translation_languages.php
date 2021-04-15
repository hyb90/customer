<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddAnotherTranslationLanguages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('translation_languages')->insert(
            array(
                'id'   => 3,
                'name' => 'france',
                'name_in_native_language' => 'français',
                'language_code' => 'FR',
                'is_default' => 0,
            )
        );
        DB::table('translation_languages')->insert(
            array(
                'id'   => 4,
                'name' => 'spanish',
                'name_in_native_language' => 'Español',
                'language_code' => 'ES',
                'is_default' => 0,
            )
        );
        DB::table('translation_languages')->insert(
            array(
                'id'   => 5,
                'name' => 'russian',
                'name_in_native_language' => 'русский',
                'language_code' => 'RU',
                'is_default' => 0,
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
