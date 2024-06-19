<?php

namespace SpExpress\Sdk\Objects\Output;

use SpExpress\Sdk\Objects\AbstractResponse;

/**
 * @var string   $postal_id
 * @var string   $result
 * @var string   $log
 * @var int      $labels_no
 * @var string[] $labels
 * @var string   $external_id
 * @var string   $labels_file_ext
 */
class PostalRespSingleObj extends AbstractResponse
{
    public $postal_id;

    public $result;

    public $log;

    public $labels_no;

    public $labels;

    public $external_id;

    public $labels_file_ext;
}
