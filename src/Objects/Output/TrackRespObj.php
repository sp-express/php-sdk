<?php



namespace SpExpress\Sdk\Objects\Output;

use SpExpress\Sdk\Objects\AbstractResponse;

class TrackRespObj extends AbstractResponse
{
    protected $number;
    protected $tts;

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return TtRespObj[]
     */
    public function getTts(): array
    {
        $result = [];

        if (is_array($this->tts)) {
            foreach ($this->tts as $packageId => $tt) {
                $result[$packageId] = new TtRespObj($tt);
            }
        }

        return $result;
    }
}
