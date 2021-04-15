<?php

namespace App\Domain\Orders\OrderStatusLogs\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OrderStatusLog extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'order_status_logs' ;

    protected $hidden=[
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'order_id',
        'order_status_id',
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
    ];


}
