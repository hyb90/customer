<?php

namespace App\Domain\General\TranslationLanguages\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TranslationLanguage extends Model
{
    use HasFactory, SoftDeletes;


    protected $hidden = [
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'region_id',
        'rename_in_native_languagegion_id',
        'language_code',
        'is_default',
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
    ];
}
