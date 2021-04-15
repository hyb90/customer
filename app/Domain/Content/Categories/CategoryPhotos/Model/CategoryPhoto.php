<?php

namespace App\Domain\Content\Categories\CategoryPhotos\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryPhoto extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "category_photos";

    protected $fillable = [
        'photo_path',
        'photo_size',
        'category_id',
        'device_id',
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
