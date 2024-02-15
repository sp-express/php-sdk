<?php

namespace SpExpress\Sdk\Objects;

#[\AllowDynamicProperties]
abstract class AbstractResponse
{
    public function __construct(array $data = [])
    {
        $this->setProperties($data);
    }

    public function setProperties($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }
}
