<?php

declare(strict_types=1);

namespace SpExpress\Sdk\Exceptions\Api;

use SpExpress\Sdk\Client\ApiError;
use SpExpress\Sdk\Exceptions\ApiException;

class IncorrectIdsFormatException extends ApiException
{
    public function __construct(ApiError $error)
    {
        parent::__construct($error->getErrorCode(), 'Incorrect ids format provided. Array of items expected', $error);
    }
}
