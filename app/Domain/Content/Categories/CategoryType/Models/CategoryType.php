<?php

namespace App\Domain\Content\Categories\CategoryType\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryType extends Model
{
    use HasFactory, SoftDeletes ;

    protected $table = 'category_type' ;


    public function categories(){
        return $this->hasMany('App\Domain\Categories\Category\Models\Category');
    }

}
