<?php

namespace App\Domain\Customers\CustomerVsLabels\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerVsLabel extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'customer_id',
        'customer_label_id',
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
