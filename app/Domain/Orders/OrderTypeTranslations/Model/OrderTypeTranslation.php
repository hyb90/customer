<?php

namespace App\Domain\Orders\OrderTypeTranslations\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderTypeTranslation extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'order_type_translations' ;

    protected $hidden=[
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'order_type_id',
        'translated_language_id',
        'order_type_name',
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
    ];


}

