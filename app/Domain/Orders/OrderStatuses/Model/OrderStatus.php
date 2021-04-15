<?php

namespace App\Domain\Orders\OrderStatuses\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderStatus extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'order_statuses' ;

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
        return $this->hasMany('App\Domain\Orders\Orders\Model\Order');
    }
    public function order_status_translations(){
        return $this->hasMany('App\Domain\Orders\Orders\OrderStatusTranslations\Model\OrderStatusTranslation');
    }

}

