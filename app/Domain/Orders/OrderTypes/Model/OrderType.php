<?php

namespace App\Domain\Orders\OrderTypes\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderType extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'order_types' ;

    protected $hidden=[
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
    ];
    public function orders(){
        return $this->hasMany('App\Domain\Orders\Orders\Model\WorkOrder');
    }
    public function order_type_translations(){
        return $this->hasMany('App\Domain\Orders\Orders\OrderTypeTranslations\Model\OrderTypeTranslation');
    }

}

