<?php



namespace SpExpress\Sdk\Objects\Output;

use SpExpress\Sdk\Objects\AbstractResponse;

/**
 * @property bool $success
 */
class PrintAppPushLabelResponseObj extends AbstractResponse
{
    protected $success;

    public function isSuccessful(): bool
    {
        return $this->success;
    }
}
