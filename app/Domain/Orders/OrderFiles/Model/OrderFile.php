<?php

namespace App\Domain\Orders\OrderFiles\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OrderFile extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'order_files' ;

    protected $hidden=[
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'url',
        'is_for_payment',
        'is_for_shipping',
        'order_id',
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
    ];


}
