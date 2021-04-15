<?php

namespace App\Domain\Employees\Employee\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = "user_id";

    protected $fillable = [
        'user_id',
        'working_hours',
        'salary',
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
    ];
    protected $hidden = [
        "user_id",
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function employeeLabels(){
        return $this->hasMany('App\Domain\Employees\EmployeeLabels\Model\EmployeeLabel');
    }
}
