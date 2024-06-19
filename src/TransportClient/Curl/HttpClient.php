<?php

declare(strict_types=1);

namespace SpExpress\Sdk\TransportClient\Curl;

use SpExpress\Sdk\TransportClient\TransportClient;
use SpExpress\Sdk\TransportClient\TransportClientResponse;
use SpExpress\Sdk\TransportClient\TransportRequestException;
use SpExpress\Sdk\Utils\EnvHelper;

class HttpClient implements TransportClient
{
    protected $login;

    protected $apiToken;

    public function authorize(string $login = null, string $apiToken = null): TransportClient
    {
        $this->login = $login;
        $this->apiToken = $apiToken;

        return $this;
    }

    public function get(string $url, ?array $payload): TransportClientResponse
    {
        if ($curl = curl_init()) {
            $url = ($url . '?' . http_build_query($payload));

            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_USERPWD, $this->login . ':' . $this->apiToken);
            curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-type:application/json']);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);


            $response = curl_exec($curl);

            $httpStatus = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
            $curlErrorCode = curl_errno($curl);
            $curlError = curl_error($curl);

            if ($curlError || $curlErrorCode) {
                $errorMessage = 'Failed curl request. Curl error ' . $curlErrorCode;

                if ($curlError !== '' && $curlError !== '0') {
                    $errorMessage .= ': ' . $curlError;
                }

                $errorMessage .= '.';

                throw new TransportRequestException($errorMessage);
            }

            return new TransportClientResponse($httpStatus, $response);
        }
    }

    public function post(string $url, ?array $payload): TransportClientResponse
    {
        if ($curl = curl_init()) {
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_USERPWD, $this->login . ':' . $this->apiToken);
            curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-type:application/json']);

            if (EnvHelper::getVersion() !== null) {
                $apiVersionHeader = 'X-PHP-SDK-Version: ' . EnvHelper::getVersion();
                curl_setopt($curl, CURLOPT_HTTPHEADER, [$apiVersionHeader]);
            }

            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            $response = curl_exec($curl);

            $httpStatus = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
            $curlErrorCode = curl_errno($curl);
            $curlError = curl_error($curl);

            if ($curlError || $curlErrorCode) {
                $errorMessage = 'Failed curl request. Curl error ' . $curlErrorCode;

                if ($curlError !== '' && $curlError !== '0') {
                    $errorMessage .= ': ' . $curlError;
                }

                $errorMessage .= '.';

                throw new TransportRequestException($errorMessage);
            }

            return new TransportClientResponse($httpStatus, $response);
        }
    }
}
