<?php

namespace SpExpress\Sdk\Utils;

use SpExpress\Sdk\TransportClient\TransportRequestException;

class EnvHelper
{
    private static $versionFilePath;

    public function __construct($versionFilePath = null)
    {
        // If no path is provided, use the default path
        $this->versionFilePath = $versionFilePath ?? __DIR__ . '/../../.version';
    }

    private static function isSemanticVersion($version): bool
    {
        return (bool)preg_match('/^(0|[1-9]\d*)\.(0|[1-9]\d*)\.(0|[1-9]\d*)(?:-((?:0|[1-9]\d*|\d*[a-zA-Z-][0-9a-zA-Z-]*)(?:\.(?:0|[1-9]\d*|\d*[a-zA-Z-][0-9a-zA-Z-]*))*))?(?:\+([0-9a-zA-Z-]+(?:\.[0-9a-zA-Z-]+)*))?$/', $version);
    }

    private static function readFileContents($filePath)
    {
        if (!file_exists($filePath)) {
            return null;
        }

        $contents = @file_get_contents($filePath); // Use the @ operator to suppress errors
        if ($contents === false) {
            return null;
        }

        return trim($contents);
    }

    public static function getVersion($versionFilePath = null)
    {
        $versionFilePath = $versionFilePath ?? self::$versionFilePath;
        $version = self::readFileContents($versionFilePath);

        if ($version === null) {
            return null;
        }

        if (!self::isSemanticVersion($version)) {
            return null;
        }

        return $version;
    }
}
