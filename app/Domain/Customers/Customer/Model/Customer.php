<?php

namespace App\Domain\Customers\Customer\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = "user_id";

    protected $fillable = [
        'user_id',
        'customer_type_id',
        'customer_status_id',
        'manager_id',
        'default_lang_id',
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
    ];
    protected $hidden = [
        "user_id",
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
