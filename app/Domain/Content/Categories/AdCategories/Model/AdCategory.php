<?php

namespace App\Models\Domain\Content\Categories\AdCategories\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'ad_categories';
}
