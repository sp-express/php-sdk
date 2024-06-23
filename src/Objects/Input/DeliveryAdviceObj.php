<?php

namespace SpExpress\Sdk\Objects\Input;

use SpExpress\Sdk\Objects\Input\Address\AddressObj;

/**
 * @property AddressObj $sender
 * @property AddressObj $receiver
 * @property string     $eta
 * @property string     $deliveryTerms
 * @property string     $terms
 */
class DeliveryAdviceObj
{
    public $sender;

    public $receiver;

    public $eta;

    public $deliveryTerms;

    public $terms;

    public $fba;
}
