<?php



namespace SpExpress\Sdk\Objects\Input;

/**
 * @property string               $reason_for_export
 * @property string               $sender_tax_id
 * @property string               $receiver_tax_id
 * @property string               $shipment_date
 * @property string               $terms_of_trade
 * @property string               $unit_value_currency
 * @property CustomsDutyItemObj[] $items
 * @property string               $sender_eori
 * @property string               $invoice_id
 * @property string               $ioss_number
 */
class CustomsDutyObj
{
    public $reason_for_export;

    public $sender_tax_id;

    public $receiver_tax_id;

    public $shipment_date;

    public $terms_of_trade;

    public $unit_value_currency;

    public $items;

    public $sender_eori;

    public $invoice_id;

    public $ioss_number;
}
