<?php

namespace SpExpress\Sdk\Client;

class ApiError
{
    protected $error_code;

    protected $desc;

    protected $details;

    public function __construct(
        array $error
    ) {
        $this->error_code = $error['error_code'] ?? null;
        $this->desc = $error['desc'] ?? null;
        $this->details = $error['details'] ?? null;
    }

    public function getErrorCode(): ?int
    {
        return $this->error_code;
    }

    public function getDescription(): string
    {
        return $this->desc;
    }

    /**
     * @return null|mixed
     */
    public function getDetails()
    {
        return $this->details;
    }
}
