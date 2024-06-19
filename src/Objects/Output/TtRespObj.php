<?php

namespace SpExpress\Sdk\Objects\Output;

use SpExpress\Sdk\Objects\AbstractResponse;

class TtRespObj extends AbstractResponse
{
    protected $id;

    protected $result;

    protected $error_code;

    protected $code;

    protected $current_stat_id;

    protected $stat_history;

    protected $country_from;

    protected $country_to;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getResult()
    {
        return $this->result;
    }

    public function getErrorCode()
    {
        return $this->error_code;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getCurrentStatId()
    {
        return $this->current_stat_id;
    }

    public function getStatHistory()
    {
        return $this->stat_history;
    }

    public function getCountryFrom()
    {
        return $this->country_from;
    }

    public function getCountryTo()
    {
        return $this->country_to;
    }
}
