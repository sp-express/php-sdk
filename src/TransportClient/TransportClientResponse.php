<?php

declare(strict_types=1);

namespace SpExpress\Sdk\TransportClient;

class TransportClientResponse
{
    public function __construct(private readonly ?int $httpStatus, private readonly ?string $body = null)
    {
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
