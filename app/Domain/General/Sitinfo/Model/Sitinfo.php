<?php

namespace App\Domain\General\Sitinfo\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sitinfo extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'one_dinar_in_dollar',
        'taxes_in_kuwait_in_dinar',
        'taxes_out_kuwait_in_dinar',
        'one_dollars_in_QAR',
        'one_dollars_in_SAR',
        'one_dollars_in_OMR',
        'one_dollars_in_AED',
        'one_dollars_in_BHD',
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
        'id'
    ];
}
