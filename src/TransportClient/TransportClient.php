<?php

namespace SpExpress\Sdk\TransportClient;

interface TransportClient
{
    public function authorize(string $login, string $apiToken): self;

    public function get(string $url, ?array $payload): TransportClientResponse;

    public function post(string $url, ?array $payload): TransportClientResponse;
}
