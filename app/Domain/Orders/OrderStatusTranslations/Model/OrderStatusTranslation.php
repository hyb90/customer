<?php

namespace App\Domain\Orders\OrderStatusTranslations\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderStatusTranslation extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'order_status_translations' ;

    protected $hidden=[
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'order_status_id',
        'translated_language_id',
        'order_status_name',
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
    ];
    public function order_status(){
        return $this->belongsTo('App\Domain\Orders\OrderStatuses\Model\OrderStatus');
    }

}

