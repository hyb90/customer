<?php

namespace App\Domain\Content\Categories\CategoryRegion\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryRegion extends Model
{
    use HasFactory , SoftDeletes;

    protected $hidden = [
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'category_id',
        'region_id',
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',

    ];
}
