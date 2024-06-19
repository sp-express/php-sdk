<?php

declare(strict_types=1);

namespace SpExpress\Sdk\TransportClient;

class TransportClientResponse
{
    private ?int $httpStatus;

    private ?string $body;

    public function __construct(?int $httpStatus, ?string $body = null)
    {
        $this->httpStatus = $httpStatus;
        $this->body = $body;
    }

    public function getHttpStatus(): ?int
    {
        return $this->httpStatus;
    }

    /**
     * @return null|string
     */
    public function getBody(): string
    {
        return $this->body;
    }
}
