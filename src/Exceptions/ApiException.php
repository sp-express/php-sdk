<?php

namespace SpExpress\Sdk\Exceptions;

use Exception;
use SpExpress\Sdk\Client\ApiError;

class ApiException extends Exception
{
    protected ApiError $error;

    public function __construct(int $errorCode, string $description, ApiError $error)
    {
        $this->error = $error;
        parent::__construct($error->getDescription() ?: $description, $errorCode);
    }

    public function getError(): ApiError
    {
        return $this->error;
    }
}
