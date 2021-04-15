<?php

namespace App\Domain\General\ServiceTranslations\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceTranslation extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
      'service_id',
      'translation_lang_id',
      'name',
      'description',
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
