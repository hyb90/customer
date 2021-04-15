<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddBaseDataToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('roles')->insert(
            array(
                'id'=>1,
                'name' => 'admin',
                'description' => 'base role'
            )
        );
        DB::table('translation_languages')->insert(
            array(
                'id'=>1,
                'name' => 'English',
                'name_in_native_language' => 'English',
                'language_code' => 'EN',
                'is_default' => 1,
            )
        );
        DB::table('translation_languages')->insert(
            array(
                'id'=>2,
                'name' => 'Arabic',
                'name_in_native_language' => 'Arabic',
                'language_code' => 'AR',
                'is_default' => 0,
            )
        );
        DB::table('region_types')->insert(
            array(
                'id'=>1,
                'verified_by_user_id' => NULL
            )
        );
        DB::table('region_type_translations')->insert(
            array(
                'id'=>1,
                'region_type_id' => 1,
                'translation_lang_id' => 1,
                'region_type_name' => "base region type",
            )
        );
        DB::table('regions')->insert(
            array(
                'id'=>1,
                'region_type_id' => 1,
            )
        );
        DB::table('region_translations')->insert(
            array(
                'id'=>1,
                'region_id' => 1,
                'translation_lang_id' => 1,
                'region_name' => "base region",
            )
        );
        DB::table('device_types')->insert(
            array(
                'id'=>1,
                'name' => 'base device type',
            )
        );
        DB::table('region_latlongs')->insert(
            array(
                'id'=>1,
                'region_lat' => 1,
                'region_long' => 1,
                'region_id' => 1,
            )
        );
        DB::table('devices')->insert(
            array(
                'id'=>3,
                'name' => 'base device',
                'description' => 'base device description',
                'region_id' => 1,
                'serial_number' => "xxxxxxxx",
                'device_types_id' => 1,
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
        Schema::table('tables', function (Blueprint $table) {
            //
        });
    }
}
