<?php



namespace SpExpress\Sdk\Exceptions\Api;

use SpExpress\Sdk\Client\ApiError;
use SpExpress\Sdk\Enums\ErrorCodes;
use SpExpress\Sdk\Exceptions\ApiException;

class ExceptionMapper
{
    public static function parse(ApiError $error): ApiException
    {
        switch ($error->getErrorCode()) {
            case ErrorCodes::ERROR_SYSTEM_MAINTENANCE:
                return new SystemMaintenanceException($error);

            case ErrorCodes::ERROR_PACKAGE_CARRIAGE_NOT_POSSIBLE:
                return new PackageCarriageNotPossibleException($error);

            case ErrorCodes::ERROR_PRINT_APP_ERROR:
                return new PrintAppException($error);

            case ErrorCodes::ERROR_DELIVERY_ADVICE_ERROR:
                return new DeliveryAdviceException($error);

            case ErrorCodes::ERROR_IDS_INVALID_FORMAT:
                return new IncorrectIdsFormatException($error);

            case ErrorCodes::ERROR_PACKAGE_NOT_FOUND_OR_YOU_ARE_NOT_THE_OWNER:
                return new NotFoundOrYouAreNotTheOwnerException($error);

            case ErrorCodes::ERROR_COULD_NOT_CANCEL:
                return new CouldNotCancelException($error);

            case 400:
                return new BadRequestException($error);

            case 401:
                return new AuthenticationException($error);

            case 404:
                return new NotFoundException($error);

            default:
                return new UnknownException($error);
        }
    }
}
