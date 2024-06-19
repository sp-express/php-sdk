<?php



namespace SpExpress\Sdk\Objects\Output;

use SpExpress\Sdk\Objects\AbstractResponse;

class ContentObjCourierPreRouting extends AbstractResponse
{
    protected $number;

    protected $packages;

    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return PackageRespObj[]
     */
    public function getPackages(): array
    {
        $result = [];

        if (is_array($this->packages)) {
            foreach ($this->packages as $package) {
                $result[] = new PackageRespObj($package);
            }
        }

        return $result;
    }
}
