<?php

declare(strict_types=1);

namespace SpExpress\Sdk\Actions;

use SpExpress\Sdk\Client\ApiRequest;
use SpExpress\Sdk\Exceptions\ApiException;
use SpExpress\Sdk\Objects\Output\TrackRespObj;

class Track
{
    public function __construct(private readonly ApiRequest $request)
    {
    }

    /**
     * @throws ApiException
     */
    public function getCouriersTrackAndTrace(
        array $packageIds
    ): TrackRespObj {
        return new TrackRespObj($this
            ->request
            ->post('/V1/track/courier', [
                'ids' => $packageIds,
            ]));
    }

    /**
     * @throws ApiException
     */
    public function getPostalTrackAndTrace(
        array $packageIds
    ): TrackRespObj {
        return new TrackRespObj($this
            ->request
            ->post('/V1/track/postal', [
                'ids' => $packageIds,
            ]));
    }

    /**
     * @throws ApiException
     */
    public function getUniversalTrackAndTrace(
        string $packageId
    ): TrackRespObj {
        return new TrackRespObj($this
            ->request
            ->post('/V1/track/universal', [
                'id' => $packageId,
            ]));
    }
}
