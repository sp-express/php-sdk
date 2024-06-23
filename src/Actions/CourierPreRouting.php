<?php

namespace SpExpress\Sdk\Actions;

use SpExpress\Sdk\Client\ApiRequest;
use SpExpress\Sdk\Exceptions\ApiException;
use SpExpress\Sdk\Objects\Input\Address\AddressObj;
use SpExpress\Sdk\Objects\Input\CustomsDuty\CustomsDutyObj;
use SpExpress\Sdk\Objects\Input\DeliveryPointObj;
use SpExpress\Sdk\Objects\Input\Options2Obj;
use SpExpress\Sdk\Objects\Input\OptionsPreRoutingObj;
use SpExpress\Sdk\Objects\Input\PackageObj;
use SpExpress\Sdk\Objects\Output\ContentObjCourierPreRouting;

class CourierPreRouting
{
    public function __construct(private readonly ApiRequest $request)
    {
    }

    /**
     * @throws ApiException
     */
    public function create(
        PackageObj $packageObj,
        AddressObj $sender,
        AddressObj $receiver,
        OptionsPreRoutingObj $options,
        Options2Obj $options2,
        CustomsDutyObj $customsDuty,
        ?DeliveryPointObj $deliveryPoint = null,
    ): ContentObjCourierPreRouting {
        return new ContentObjCourierPreRouting($this
            ->request
            ->post('/V1/courier/create-pre-routing', [
                'package' => $packageObj,
                'sender' => $sender,
                'receiver' => $receiver,
                'options' => $options,
                'options2' => $options2,
                'customs_duty' => $customsDuty,
                'delivery_point' => $deliveryPoint,
            ]));
    }

    /**
     * @throws ApiException
     */
    public function cancel(
        array $ids,
    ): bool {
        $this->request->post('/V1/courier/cancel', [
            'id' => $ids,
        ]);

        return true;
    }
}
