<?php

namespace App\Domain\General\Regions\Region\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'is_verified_from_us',
        'parent_region_id',
        'region_type_id',
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
    public function stocks(){
        return $this->hasMany('App\Domain\Stocks\Stock\Model\Stock');
    }
}
