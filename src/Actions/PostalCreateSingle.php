<?php

namespace SpExpress\Sdk\Actions;

use SpExpress\Sdk\Client\ApiRequest;
use SpExpress\Sdk\Exceptions\ApiException;
use SpExpress\Sdk\Objects\Input\AddressObj;
use SpExpress\Sdk\Objects\Input\CustomsDutyObj;
use SpExpress\Sdk\Objects\Input\Options2PostalSingleObj;
use SpExpress\Sdk\Objects\Input\PostalSingleObj;
use SpExpress\Sdk\Objects\Output\PostalContentSingleObj;

class PostalCreateSingle
{
    public function __construct(private readonly ApiRequest $request)
    {
    }

    /**
     * @throws ApiException
     */
    public function create(
        PostalSingleObj         $postal,
        AddressObj              $sender,
        AddressObj              $receiver,
        Options2PostalSingleObj $options2,
        CustomsDutyObj          $customsDuty
    ): PostalContentSingleObj {
        return new PostalContentSingleObj($this
            ->request
            ->post('/V1/postal/create-single', [
                'postal' => $postal,
                'sender' => $sender,
                'receiver' => $receiver,
                'options2' => $options2,
                'customs_duty' => $customsDuty,
            ]));
    }
}
