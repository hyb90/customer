<?php

namespace App\Domain\General\Regions\RegionType\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegionType extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'is_verified_from_us',
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id'
    ];

    protected $hidden = [
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function translations(){
        return $this->hasMany('App\Domain\Regions\RegionTypeTranslation\Model\RegionTypeTranslation');
    }
    public function regions(){
        return $this->hasMany('App\Domain\Regions\Region\Model\Region');
    }

}
