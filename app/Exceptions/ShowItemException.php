<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ShowItemException extends Exception
{
    public function __construct(
        string $message = "Registro no encontrado",
        int $code = Response::HTTP_NOT_FOUND,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function render()
    {
        return response()->json([
            'message' => $this->message
        ], $this->code);
    }
}