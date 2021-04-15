<?php

namespace App\Domain\General\Regions\RegionTypeTranslation\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegionTypeTranslation extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
      'region_type_id',
      'translation_lang_id',
      'region_type_name',
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

    public function region_type(){
        return $this->belongsTo('App\Domain\Regions\RegionTypeTranslation\Model\RegionTypeTranslation');
    }
}
