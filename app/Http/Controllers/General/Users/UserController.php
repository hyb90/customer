<?php

namespace App\Http\Controllers\General\Users;

use App\Domain\General\Auth\Roles\Actions\ChangeRoleAction;
use App\Domain\General\Auth\Roles\Actions\CreateRoleAction;
use App\Domain\General\Auth\Roles\DTO\ChangeRoleDTO;
use App\Domain\General\Auth\Roles\DTO\RoleDTO;
use App\Domain\General\Users\Admin\Model\Admin;
use App\Domain\Customers\Customer\Model\Customer;
use App\Domain\Employees\Employee\Model\Employee;
use App\Domain\General\Users\User\Actions\DeleteUserAction;
use App\Domain\General\Users\User\DTO\UserDTO;
use App\Domain\Vendors\Model\Vendor;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\General\Auth\Roles\CreateRoleRequest;
use App\Http\Requests\General\Auth\Roles\ChangeRoleRequest;
use App\Http\Requests\General\Users\UpdateUserProfileRequest;
use App\Http\Requests\General\Users\UserProfileRequest;
use App\Http\ViewModels\General\Users\ShowAllUsersVM;
use App\Http\ViewModels\General\Users\ShowUserVM;
use App\Http\ViewModels\General\Users\UserLocations\ShowAllUserLocationsVM;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\Help;

class UserController extends Controller
{
    //

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    function register(Request $request)
    {
        $valid = validator($request->only('email', 'name', 'password'), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
        if ($valid->fails()) {
            $jsonError = response()->json($valid->errors()->all(), 400);
            return response()->json($jsonError);
        }
        $data = request()->only('email', 'name', 'password');
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => Role::where('name', '=', 'user')->first()->id
        ]);
        $objToken = $user->createToken('Husverkit', ['user']);
        return response()->json($user, 200)->cookie(
            'token', $objToken->accessToken, 360
        );
    }

    /**
     * Get a validator for an incoming Loging request.
     *
     * @param array $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    function signin(Request $request)
    {
        $data = $request->only('email', 'password');
        $validator = validator($data, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 417);
        }
        $email = $data['email'];
        $password = $data['password'];
        $user = User::Where('email', $email)->first();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        if ($user->validateForPassportPasswordGrant($password)) {
            $objToken = $user->createToken('Nobis', ['user']);
            return response()->json($user, 200)->cookie(
                'token', $objToken->accessToken, 10
            );
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    /**
     * Change Role for specific user by Admin.
     *
     * @param array $request
     */
    function changeRole(ChangeRoleRequest $request)
    {
        $changeRoleDTO =  ChangeRoleDTO::fromRequest($request);

        $scope = ChangeRoleAction::execute($changeRoleDTO);

        return response()->json(['msg'=>'Role updated to '.substr( $scope ,2,strlen($scope)-4)]);
    }

    public function index(){
        $users = new ShowAllUsersVM();
        $response = Helpers::createSuccessResponse($users->toArray());
        return response()->json($response);
    }

    public function profile(UserProfileRequest $userProfileRequest){
        $user = User::find($userProfileRequest->json('id'));
        $users = new ShowUserVM($user,$user->role()->first()->name);
        $response = Helpers::createSuccessResponse($users->toArray());
        return response()->json($response);
    }

    public function updateUserProfile(UpdateUserProfileRequest $editUserProfileRequest){

        $userDTO = UserDTO::fromRequest($editUserProfileRequest->json()->all());
        $user = UpdateUserAction();
    }

    public function getLocationsOfUser($user_id){
        $userLocations = new ShowAllUserLocationsVM($user_id);
        $response = Helpers::createSuccessResponse($userLocations->toArray());

        return response()->json($response);
    }

}
