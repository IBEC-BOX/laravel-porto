<?php

namespace AdminKit\Porto\Generator\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class GeneratorErrorException extends Exception
{
    protected $code = Response::HTTP_BAD_REQUEST;

    protected $message = 'Generator Error.';
}
