<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    //
    
    public function render($request)
    {
        // return response("hii");
        return response()->view('exception-learn.custom-error');
    }
}
