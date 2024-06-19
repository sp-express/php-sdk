<?php

declare(strict_types=1);

namespace SpExpress\Sdk\Exceptions\Api;

use SpExpress\Sdk\Client\ApiError;
use SpExpress\Sdk\Enums\ErrorCodes;
use SpExpress\Sdk\Exceptions\ApiException;

class ExceptionMapper
{
    public static function parse(ApiError $error): ApiException
    {
        return match ($error->getErrorCode()) {
            ErrorCodes::ERROR_SYSTEM_MAINTENANCE => new SystemMaintenanceException($error),
            ErrorCodes::ERROR_PACKAGE_CARRIAGE_NOT_POSSIBLE => new PackageCarriageNotPossibleException($error),
            ErrorCodes::ERROR_PRINT_APP_ERROR => new PrintAppException($error),
            ErrorCodes::ERROR_DELIVERY_ADVICE_ERROR => new DeliveryAdviceException($error),
            ErrorCodes::ERROR_IDS_INVALID_FORMAT => new IncorrectIdsFormatException($error),
            ErrorCodes::ERROR_PACKAGE_NOT_FOUND_OR_YOU_ARE_NOT_THE_OWNER => new NotFoundOrYouAreNotTheOwnerException($error),
            ErrorCodes::ERROR_COULD_NOT_CANCEL => new CouldNotCancelException($error),
            400 => new BadRequestException($error),
            401 => new AuthenticationException($error),
            404 => new NotFoundException($error),
            default => new UnknownException($error),
        };
    }
}
