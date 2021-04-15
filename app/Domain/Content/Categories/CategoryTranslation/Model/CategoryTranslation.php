<?php

namespace App\Domain\Content\Categories\CategoryTranslation\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryTranslation extends Model
{
    use HasFactory, SoftDeletes ;
    protected $table = 'category_translations';
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
      'translation_lang_id',
       'category_name',
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',

    ];

    public function category(){
        return $this->belongsTo('App\Domain\Content\Categories\Category\Model\Category');
    }
}
