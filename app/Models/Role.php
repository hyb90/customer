<?php

namespace App\Models;

use App\Exceptions\RequestException;
use App\Helpers\Helpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User ;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "roles" ;

    protected $fillable = [
      'name', 'description',
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
    public function users(){
        return $this->hasMany(User::class);
    }

    public static function get_role_id($role_name){
        try {
            $role_id = Role::whereRaw('LOWER(`name`) LIKE ?',[$role_name])->first()->id;
        }catch(\Exception $exception){
            throw new RequestException( response()->json(Helpers::createErrorResponse(["role" => [ "There is no ".$role_name." role, Please add one."]])) );

        }
        return $role_id;
    }
}
