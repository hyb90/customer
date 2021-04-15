<?php

namespace App\Domain\Content\Categories\Category\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $hidden = [
      'is_verified_from_us',
      'created_by_user_id',
      'updated_by_user_id',
      'deleted_by_user_id',
      'created_at',
      'updated_at',
      'deleted_at',
    ];
    protected $fillable = [
        'max_price_new',
        'min_price_new',
        'max_price_old',
        'min_price_old',
        'mobile_site_photo',
        'android_site_photo',
        'iphone_site_photo',
        'tabe_site_photo',
        'pc_site_photo',
        'show_pages',
        'size1_site_photo',
        'size2_site_photo',
        'size3_site_photo',
        'size4_site_photo',
        'size5_site_photo',
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',

    ];
    public function category_type(){
        return $this->belongsTo('App\Domain\Content\Categories\CategoryType\Models\CategoryType');
    }
    public function category_translations(){
        return $this->hasMany('App\Domain\Content\Categories\CategoryTranslation\Model\CategoryTranslation');
    }
    public function category_photos(){
        return $this->hasMany('App\Domain\Content\Categories\CategoryPhotos\Model\CategoryPhoto');
    }
    public function category_pages(){
        return $this->hasMany('App\Domain\Content\Categories\CategoryPages\Model\CategoryPage');
    }
    public function category_region(){
        return $this->hasMany('App\Domain\Content\Categories\CategoryRegion\Model\CategoryRegion');
    }

    public function sons(){
        return $this->hasMany('App\Domain\Content\Categories\Category2Category\Models\Category_2_category', 'parent_id');
    }
    public function parents(){
        return $this->hasMany('App\Domain\Content\Categories\Category2Category\Models\Category_2_category', 'son_id');
    }
}
