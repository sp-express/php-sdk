<?php

namespace SpExpress\Sdk\Objects\Output;

use SpExpress\Sdk\Objects\AbstractResponse;

/**
 * @var int                   $number
 * @var PostalRespSingleObj[] $postals
 */
class PostalContentSingleObj extends AbstractResponse
{
    protected $number;

    protected $postals;

    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return PostalRespSingleObj[]
     */
    public function getPostals(): array
    {
        $result = [];

        if (is_array($this->postals)) {
            foreach ($this->postals as $postal) {
                $result[] = new PostalRespSingleObj($postal);
            }
        }

        return $result;
    }
}
