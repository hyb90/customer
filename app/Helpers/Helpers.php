<?php

namespace App\Helpers;

class Helpers
{
    public static function createSuccessResponse($data = null)
    {
        $response = ['success' => true];
        if($data){
            $response['data'] = $data;
        }

        return $response;
    }

    public static function createErrorResponse($data){
           return ["msg" => $data];
    }
}
