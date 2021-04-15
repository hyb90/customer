<?php

namespace App\Domain\General\Users\UserResions\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRegion extends Model
{
    use HasFactory;
    public $timestamps = [ "created_at" ];
    protected $fillable = [
        'user_id',
        'region_id',
        'ip'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
