<?php

namespace SpExpress\Sdk\Exceptions\Api;

use SpExpress\Sdk\Client\ApiError;
use SpExpress\Sdk\Enums\ErrorCodes;
use SpExpress\Sdk\Exceptions\ApiException;

class NotFoundOrYouAreNotTheOwnerException extends ApiException
{
    public function __construct(ApiError $error)
    {
        parent::__construct(ErrorCodes::ERROR_PACKAGE_NOT_FOUND_OR_YOU_ARE_NOT_THE_OWNER, 'Package not found or you are not the owner', $error);
    }
}
