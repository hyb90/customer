<?php

namespace App\Domain\General\Auth\General\Login\Actions;

use App\Domain\General\Auth\General\Login\DTO\LoginDTO;
use App\Exceptions\RequestException;
use App\Helpers\Helpers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Passport;
use Carbon\Carbon;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class LoginAction
{
    public static function execute(
        LoginDTO $credentials
    ){
        $user = null ;
        if($credentials->username != null)
            $user = User::where('username', $credentials->username)->where('deleted_at',NULL)->first();
        else if($credentials->email != null)
            $user = User::where('email', $credentials->email)->where('deleted_at',NULL)->first();
        else if($credentials->mobile_phone != null)
            $user = User::where('mobile_phone', $credentials->mobile_phone)->where('deleted_at',NULL)->first();
        else
            throw new RequestException(response()->json(['msg' => 'some thing wrong , please call the vendor.'], 422));
        if ( Hash::check($credentials->password, $user->password) ) {
            Passport::tokensExpireIn(Carbon::now()->addDays(30));
            Passport::refreshTokensExpireIn(Carbon::now()->addDays(60));
            $objToken = $user->createToken('MyApp', [$user->getRole()]);
            $strToken = $objToken->accessToken;
            $expiration = $objToken->token->expires_at->diffInSeconds(Carbon::now());
            return
            array_merge($user->toArray(),[
                "expires_in" => $expiration,
                "token_type" => "Bearer",
                'role' => $user->getRole(),
                'token' => $strToken]);
        }
        else
        {
            throw new RequestException( response()->json(Helpers::createErrorResponse(["password" => [ "Invalid password."]])) );
        }
    }
}
