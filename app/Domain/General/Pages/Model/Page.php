<?php

namespace App\Domain\General\Pages\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use function PHPUnit\Framework\throwException;

class Page extends Model
{
    use HasFactory, SoftDeletes, SoftDeletes;

    protected $fillable = [
        'name',
        'endpoint',
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
