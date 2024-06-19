<?php



namespace SpExpress\Sdk\Exceptions\Api;

use SpExpress\Sdk\Client\ApiError;
use SpExpress\Sdk\Exceptions\ApiException;

class DeliveryAdviceException extends ApiException
{
    public function __construct(ApiError $error)
    {
        parent::__construct($error->getErrorCode(), $error->getDescription(), $error);
    }
}
