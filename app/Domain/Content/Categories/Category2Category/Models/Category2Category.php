<?php

namespace App\Domain\Content\Categories\Category2Category\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category2Category extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'parent_id','son_id',
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
    public function parent_category(){
        return $this->belongsTo('App\Domain\Categories\Category\Models\Category','parent_id');
    }

    public function son_category(){
        return $this->belongsTo('App\Domain\Categories\Category\Models\Category','son_id');
    }
}
