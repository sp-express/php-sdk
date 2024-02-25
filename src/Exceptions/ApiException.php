<?php

namespace SpExpress\Sdk\Exceptions;

use SpExpress\Sdk\Client\ApiError;

class ApiException extends \Exception
{
    /**
     * @var ApiError
     */
    protected $error;

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
