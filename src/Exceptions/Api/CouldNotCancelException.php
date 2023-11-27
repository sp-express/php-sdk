<?php

declare(strict_types=1);


namespace SpExpress\Sdk\Exceptions\Api;


use SpExpress\Sdk\Client\ApiError;
use SpExpress\Sdk\Exceptions\ApiException;

class CouldNotCancelException extends ApiException
{
    public function __construct(ApiError $error)
    {
        parent::__construct($error->getErrorCode(), 'Package cannot be cancelled', $error);
    }
}