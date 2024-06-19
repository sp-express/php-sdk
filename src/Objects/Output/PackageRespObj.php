<?php

declare(strict_types=1);

namespace SpExpress\Sdk\Objects\Output;

use SpExpress\Sdk\Objects\AbstractResponse;

class PackageRespObj extends AbstractResponse
{
    protected $package_id;

    protected $result;

    protected $log;

    protected $labels_no;

    protected $labels;

    protected $labels_file_ext;

    protected $external_id;

    protected $return;

    protected $operator_name;

    protected $operator_url;

    public function getPackageId()
    {
        return $this->package_id;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function getLog()
    {
        return $this->log;
    }

    public function getLabelsNo()
    {
        return $this->labels_no;
    }

    public function getLabels(): array
    {
        return $this->labels;
    }

    public function getLabelsFileExt()
    {
        return $this->labels_file_ext;
    }

    public function getExternalId()
    {
        return $this->external_id;
    }

    public function getReturn()
    {
        return $this->return;
    }

    public function getOperatorName()
    {
        return $this->operator_name;
    }

    public function getOperatorUrl()
    {
        return $this->operator_url;
    }
}
