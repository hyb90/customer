<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Throwable;

class RequestException extends Exception
{
    private $msg;

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $this->msg = $message;
        parent::__construct($message, $code, $previous);
    }

    public function render(Request $request){
        return $this->msg;
    }
}
