<?php

namespace SpExpress\Sdk\Exceptions\Api;

use SpExpress\Sdk\Client\ApiError;
use SpExpress\Sdk\Enums\ErrorCodes;
use SpExpress\Sdk\Exceptions\ApiException;

class SystemMaintenanceException extends ApiException
{
    public function __construct(ApiError $error)
    {
        parent::__construct(ErrorCodes::ERROR_SYSTEM_MAINTENANCE, 'System maintenance. Please try again later', $error);
    }
}
