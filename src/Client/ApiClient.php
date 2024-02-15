<?php

namespace SpExpress\Sdk\Client;

use SpExpress\Sdk\Actions\CourierNonRouting;
use SpExpress\Sdk\Actions\CourierPreRouting;
use SpExpress\Sdk\Actions\DeliveryAdvice;
use SpExpress\Sdk\Actions\Email;
use SpExpress\Sdk\Actions\PostalCreateSingle;
use SpExpress\Sdk\Actions\Printer;
use SpExpress\Sdk\Actions\Track;

class ApiClient
{
    /**
     * @var ApiRequest
     */
    private $request;

    /**
     * @var CourierPreRouting
     */
    private $courierPreRouting;

    /**
     * @var CourierNonRouting
     */
    private $courierNonRouting;

    /**
     * @var Track
     */
    private $track;

    /**
     * @var PostalCreateSingle
     */
    private $postalCreateSingle;

    /**
     * ApiClient constructor.
     */
    public function __construct(
        string  $login,
        string  $apiKey,
        ?string $host = null
    ) {
        $this->request = new ApiRequest($login, $apiKey, $host);
    }

    public function courierPreRouting(): CourierPreRouting
    {
        if (!$this->courierPreRouting) {
            $this->courierPreRouting = new CourierPreRouting($this->request);
        }

        return $this->courierPreRouting;
    }

    public function courierNonRouting(): CourierNonRouting
    {
        if (!$this->courierNonRouting) {
            $this->courierNonRouting = new CourierNonRouting($this->request);
        }

        return $this->courierNonRouting;
    }


    public function track(): Track
    {
        if (!$this->track) {
            $this->track = new Track($this->request);
        }

        return $this->track;
    }

    public function postalCreateSingle(): PostalCreateSingle
    {
        if (!$this->postalCreateSingle) {
            $this->postalCreateSingle = new PostalCreateSingle($this->request);
        }

        return $this->postalCreateSingle;
    }
}
