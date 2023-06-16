<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;
class CheckoutException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'error' => $this->getMessage(),
        ], $this->getCode() ?: Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
