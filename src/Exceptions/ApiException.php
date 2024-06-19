<?php

declare(strict_types=1);

namespace SpExpress\Sdk\Exceptions;

use SpExpress\Sdk\Client\ApiError;

class ApiException extends \Exception
{
    public function __construct(int $errorCode, string $description, protected ApiError $error)
    {
        parent::__construct($this->error->getDescription() ?: $description, $errorCode);
    }

    public function getError(): ApiError
    {
        return $this->error;
    }
}
