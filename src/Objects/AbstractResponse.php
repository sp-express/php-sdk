<?php

namespace SpExpress\Sdk\Objects;

abstract class AbstractResponse
{
    public function __construct(array $data = [])
    {
        $this->setProperties($data);
    }

    public function setProperties($data): void
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }
}
