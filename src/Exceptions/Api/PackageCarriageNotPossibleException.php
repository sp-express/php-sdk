<?php



namespace SpExpress\Sdk\Exceptions\Api;

use SpExpress\Sdk\Client\ApiError;
use SpExpress\Sdk\Enums\ErrorCodes;
use SpExpress\Sdk\Exceptions\ApiException;

class PackageCarriageNotPossibleException extends ApiException
{
    public function __construct(ApiError $error)
    {
        parent::__construct(ErrorCodes::ERROR_PACKAGE_CARRIAGE_NOT_POSSIBLE, 'Carriage is not possible for provided source & destination', $error);
    }
}
