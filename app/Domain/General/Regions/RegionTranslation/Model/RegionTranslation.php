<?php

namespace App\Domain\General\Regions\RegionTranslation\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionTranslation extends Model
{
    use HasFactory;
    protected $table = "region_translations";


    protected $fillable = [
        'region_id',
        'translation_lang_id',
        'region_name',
        'region_description',
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
    ];
    protected $hidden = [

        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
