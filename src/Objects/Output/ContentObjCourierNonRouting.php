<?php


namespace SpExpress\Sdk\Objects\Output;

use SpExpress\Sdk\Enums\Result;
use SpExpress\Sdk\Exceptions\Api\LabelException;
use SpExpress\Sdk\Objects\AbstractResponse;

class ContentObjCourierNonRouting extends AbstractResponse
{
    protected $number;
    protected $packages;

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return PackageRespObj[]
     * @throws LabelException
     */
    public function getPackages(): array
    {
        $result = [];

        if (is_array($this->packages)) {
            foreach ($this->packages as $package) {
                $packageRespObj = new PackageRespObj($package);

                if ($packageRespObj->getResult() !== Result::OK) {
                    throw new LabelException(
                        sprintf(
                            'Label [%s] generation failed: %s',
                            $packageRespObj->getPackageId(),
                            $packageRespObj->getLog()
                        ));
                }

                $result[] = $packageRespObj;
            }
        }

        return $result;
    }
}
