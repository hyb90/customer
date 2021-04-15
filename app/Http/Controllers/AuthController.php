<?php

namespace App\Http\Controllers;

use App\Domain\General\Auth\General\Login\Actions\LoginAction;
use App\Domain\General\Auth\General\Login\DTO\LoginDTO;
use App\Domain\Customers\Customer\Actions\CreateCustomerAction;
use App\Domain\Customers\Customer\DTO\CustomerDTO;
use App\Domain\Employees\Employee\Actions\CreateEmployeeAction;
use App\Domain\Employees\Employee\DTO\EmployeeDTO;
use App\Domain\General\Users\User\Actions\CreateUserAction;
use App\Domain\General\Users\User\DTO\UserDTO;
use App\Domain\General\Users\UserResions\Actions\RecordUserRegionAction;
use App\Domain\General\Users\UserResions\DTO\UserRegionDTO;
use App\Domain\Vendors\Actions\CreateVendorAction;
use App\Domain\Vendors\DTO\VendorDTO;
use App\Exceptions\RequestException;
use App\Helpers\Helpers;
use App\Http\Requests\General\Auth\Admin\AdminRegisterRequest;
use App\Http\Requests\Customers\Customer\CustomerLoginRequest;
use App\Http\Requests\Customers\Customer\CustomerRegisterRequest;
use App\Http\Requests\Employees\Employee\EmployeeLoginRequest;
use App\Http\Requests\Employees\Employee\EmployeeRegisterRequest;
use App\Http\Requests\General\Auth\General\LoginUsingEmailRequest;
use App\Http\Requests\General\Auth\General\LoginUsingPhoneNumberRequest;
use App\Http\Requests\General\Auth\General\LoginUsingUsernameRequest;
use App\Http\Requests\General\Auth\Vendor\VendorLoginRequest;
use App\Http\Requests\General\Auth\Vendor\VendorRegisterRequest;
use App\Http\ViewModels\General\Users\ShowUserVM;
use App\Mail\ActivationEmail;
use App\Mail\ResetPasswordEmail;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Laravel\Passport\Passport;

class AuthController extends Controller
{
    /**
     * login API
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validator1 = Validator::make($request->json()->all(), (new LoginUsingEmailRequest)->rules());
        $validator2 = Validator::make($request->json()->all(), (new LoginUsingUsernameRequest)->rules());
        $validator3 = Validator::make($request->json()->all(), (new LoginUsingPhoneNumberRequest)->rules());
        if ($validator1->fails() && $validator2->fails() && $validator3->fails()) {
            $errors1 = null;
            $errors2 = null;
            $errors3 = null;
            if ($request->json()->has('email')) {
                $errors1 = (new ValidationException($validator1))->errors();
            } else {
                if ($request->json()->has('username')) {
                    $errors2 = (new ValidationException($validator2))->errors();
                } else {
                    if ($request->json()->has('mobile_phone')) {
                        $errors3 = (new ValidationException($validator3))->errors();
                    } else {
                        $errors1 = [
                            'please choose one of the the login options...',
                            'using email',
                            'using username',
                            'using mobile phone'
                        ];
                    }
                }
            }
            throw new RequestException(
                response()->json(['msg' => array_values(array_filter([$errors1, $errors2, $errors3]))], 422)
            );
        }
        $credentials = LoginDTO::fromRequest($request->json()->all());
        $login = LoginAction::execute($credentials);
        $userRegionDTO = UserRegionDTO::fromRequest(['user_id' => $login['id'], 'ip' => $request->json('ip')]);
        RecordUserRegionAction::execute($userRegionDTO);
        $response = Helpers::createSuccessResponse($login);
        return response()->json($response);
    }

    public function customerRegister(CustomerRegisterRequest $customerRegisterRequest)
    {
        $role_id = Role::get_role_id('customer');
        $customerRegisterRequest->json()->add(['role_id' => $role_id]);
        $userDTO = UserDTO::fromRequest($customerRegisterRequest->json()->all());
        $user = CreateUserAction::execute($userDTO);
        $customerRegisterRequest->json()->add(['user_id' => $user->id]);
        $customerDTO = CustomerDTO::fromRequest($customerRegisterRequest->json()->all());
        $customer = CreateCustomerAction::execute($customerDTO);
        $userRegionDTO = UserRegionDTO::fromRequest($customerRegisterRequest->json()->all());
        $userRegion = RecordUserRegionAction::execute($userRegionDTO);
        $user = new ShowUserVM($user, 'customer');
        $response = Helpers::createSuccessResponse($user->toArray());
        return response()->json($response, 200);
    }

    public function vendorRegister(VendorRegisterRequest $vendorRegisterRequest)
    {
        $role_id = Role::get_role_id('vendor');
        $vendorRegisterRequest->json()->add(['role_id' => $role_id]);
        $userDTO = UserDTO::fromRequest($vendorRegisterRequest->json()->all());
        $user = CreateUserAction::execute($userDTO);
        $vendorRegisterRequest->json()->add(['user_id' => $user->id]);
        $vendorDTO = VendorDTO::fromRequest($vendorRegisterRequest->json()->all());
        $vendor = CreateVendorAction::execute($vendorDTO);
        $userRegionDTO = UserRegionDTO::fromRequest($vendorRegisterRequest->json()->all());
        $userRegion = RecordUserRegionAction::execute($userRegionDTO);
        $user = new ShowUserVM($user, 'vendor');
        $response = Helpers::createSuccessResponse($user->toArray());
        return response()->json($response, 200);
    }

    public function employeeRegister(EmployeeRegisterRequest $employeeRegisterRequest)
    {
        $userDTO = UserDTO::fromRequest($employeeRegisterRequest->json()->all());
        $user = CreateUserAction::execute($userDTO);
        $employeeRegisterRequest->json()->add(['user_id' => $user->id]);
        $employeeDTO = EmployeeDTO::fromRequest($employeeRegisterRequest->json()->all());
        $employee = CreateEmployeeAction::execute($employeeDTO);
        $userRegionDTO = UserRegionDTO::fromRequest($employeeRegisterRequest->json()->all());
        $userRegion = RecordUserRegionAction::execute($userRegionDTO);
        $user = new ShowUserVM($user, 'employee');
        $response = Helpers::createSuccessResponse($user->toArray());
        return response()->json($response, 200);
    }

    public function sendActivationEmail(Request $request)
    {
        $user = User::Where('id', $request->user()->id)->first();
        $user->verification_token = md5(microtime(true));
        $user->verified = $user->UNVERIFIED_USER;
        $user->save();
        Mail::to($user->email)->send(new ActivationEmail($user));
        $user->save();
        return response()->json(["user" => $user, "message" => "success"], 200);
    }

    public function activatEmail(Request $request)
    {
        $user = User::Where('id', $request->user()->id)->first();
        if (!$user) {
            $user = User::Where('verification_token', $request->verification_token)->first();
        }
        if ($user->verification_token == "activated") {
            return response()->json(["user" => $user, "message" => "Activation Link expired"], 200);
        } else {
            if ($user->verification_token == $request->verification_token) {
                $user->verification_token = "activated";
                $user->verified = $user->VERIFIED_USER;
                $user->save();
                return response()->json(["user" => $user, "message" => "Activation success"], 200);
            }
        }
        return response()->json(["user" => $user, "message" => "Activation Failed"], 200);
    }

    public function sendResetPasswordEmail(Request $request)
    {
        $user = User::Where('email', $request->email)->first();
        if ($user) {
            $user->resetpassword_token = md5(microtime(true));
            $user->save();
            Mail::to($user->email)->send(new ResetPasswordEmail($user));
            return response()->json(["user" => $user, "message" => "success"], 200);
        }
        return response()->json(["message" => "Failed"], 200);
    }

    public function resetPassword(Request $request)
    {
        $user = User::Where('id', $request->user()->id)->first();
        if ($user->resetpassword_token == "reseted") {
            return response()->json(["user" => $user, "message" => "Reset Password Link expired"], 200);
        } else {
            if ($user->resetpassword_token == $request->resetpassword_token) {
                $user->resetpassword_token = "reseted";
                $user->password = Hash::make($request->password);
                $user->save();
                return response()->json(["user" => $user, "message" => "Activation success"], 200);
            }
        }
        return response()->json(["user" => $user, "message" => "Activation Failed"], 200);
    }

}
