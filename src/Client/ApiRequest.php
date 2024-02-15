<?php

namespace SpExpress\Sdk\Client;

use SpExpress\Sdk\Exceptions\Api\ExceptionMapper;
use SpExpress\Sdk\Exceptions\ApiException;
use SpExpress\Sdk\TransportClient\Curl\HttpClient;
use SpExpress\Sdk\TransportClient\TransportClientResponse;

final class ApiRequest
{
    private const HOST = 'https://api.sp.express';

    private const KEY_ERROR = 'error';
    private const KEY_RESPONSE = 'response';
    private const KEY_MESSAGE = 'message';
    private const KEY_STATUS = 'status';

    private $httpClient;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $host;

    public function __construct(string $login, string $apiKey, ?string $host)
    {
        $this->httpClient = new HttpClient();
        $this->login = $login;
        $this->apiKey = $apiKey;
        $this->host = $host ?: self::HOST;
    }

    /**
     * @param null $id
     */
    public function get(string $action, ?array $params = [])
    {
        $url = $this->host . $action;

        $response = $this
            ->httpClient
            ->authorize($this->login, $this->apiKey)
            ->get($url, $params);

        return $this->parseResponse($response);
    }

    /**
     * @throws ApiException
     *
     * @return array|mixed
     */
    public function post(string $action, ?array $payload = [])
    {
        $url = $this->host . $action;

        $response = $this
            ->httpClient
            ->authorize($this->login, $this->apiKey)
            ->post($url, $payload);

        return $this->parseResponse($response);
    }

    /**
     * @throws ApiException
     *
     * @return array|mixed
     */
    private function parseResponse(TransportClientResponse $response): array
    {
        $body = $response->getBody();
        $decodeBody = $this->decodeBody($body);

        // @todo: refactor
        if (isset($decodeBody[self::KEY_ERROR]) || (isset($decodeBody[self::KEY_STATUS]) && $decodeBody[self::KEY_STATUS] >= 400)) {
            $error = $decodeBody[self::KEY_ERROR] ?? [
                'desc' => $decodeBody[self::KEY_MESSAGE] ?? 'unknown error',
                'error_code' => $decodeBody['status'] ?? null,
            ];

            $apiError = new ApiError($error);

            throw ExceptionMapper::parse($apiError);
        }

        return $decodeBody;
    }

    private function decodeBody(string $body): array
    {
        $decodedBody = json_decode($body, true);

        if ($decodedBody === null || !is_array($decodedBody)) {
            $decodedBody = [];
        }

        return $decodedBody[self::KEY_RESPONSE] ?? $decodedBody;
    }
}
