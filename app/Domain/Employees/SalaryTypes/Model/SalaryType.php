<?php

namespace App\Domain\Employees\SalaryTypes\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalaryType extends Model
{
    use HasFactory,SoftDeletes;
}
