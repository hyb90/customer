<?php

namespace App\Http\Controllers\General\roles;

use App\Domain\General\Auth\Roles\Actions\CreateRoleAction;
use App\Domain\General\Auth\Roles\Actions\UpdateRoleAction;
use App\Domain\General\Auth\Roles\DTO\RoleDTO;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\General\Auth\Roles\CreateRoleRequest;
use App\Http\Requests\General\Auth\Roles\UpdateRoleRequest;
use App\Http\ViewModels\General\Roles\RolesIndexVM;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function create(CreateRoleRequest $createRoleRequest){
        $roleDTO =  RoleDTO::fromRequest($createRoleRequest);
        $role = CreateRoleAction::execute($roleDTO);
        $response = Helpers::createSuccessResponse($role);

        return response()->json($response,200);
    }

    public function index(){
        $roles = new RolesIndexVM();
        $response = Helpers::createSuccessResponse($roles->toArray());
        return response()->json($response,200);

    }
    public function show(Role $role){
        $response = Helpers::createSuccessResponse($role);
        return response()->json($response,200);
    }
    public function update(UpdateRoleRequest $updateRoleRequest ,Role $role){
        $roleDTO =  RoleDTO::fromRequest($updateRoleRequest);
        $role = UpdateRoleAction::execute($role,$roleDTO);
        $response = Helpers::createSuccessResponse($role);

        return response()->json($response,200);
    }
    public function destroy(Role $role){
        $role->deleted_by_user_id = Auth::id();
        $role->save();
        $role->delete();
        $response = Helpers::createSuccessResponse('deleted successfully.');
        return response()->json($response,200);
    }
}
