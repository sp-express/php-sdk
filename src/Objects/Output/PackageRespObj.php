<?php



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

    /**
     * @return mixed
     */
    public function getPackageId()
    {
        return $this->package_id;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return mixed
     */
    public function getLog()
    {
        return $this->log;
    }

    /**
     * @return mixed
     */
    public function getLabelsNo()
    {
        return $this->labels_no;
    }

    public function getLabels(): array
    {
        return $this->labels;
    }

    /**
     * @return mixed
     */
    public function getLabelsFileExt()
    {
        return $this->labels_file_ext;
    }

    /**
     * @return mixed
     */
    public function getExternalId()
    {
        return $this->external_id;
    }

    /**
     * @return mixed
     */
    public function getReturn()
    {
        return $this->return;
    }

    /**
     * @return mixed
     */
    public function getOperatorName()
    {
        return $this->operator_name;
    }
}
