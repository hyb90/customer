<?php

namespace App\Domain\Content\Categories\CategoryPages\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryPage extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
      'category_id',
      'page_id',
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
