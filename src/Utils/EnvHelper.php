<?php

declare(strict_types=1);

namespace SpExpress\Sdk\Utils;

class EnvHelper
{
    private const PATH_VERSION_FILE = __DIR__ . '/../../.version';

    private static function isSemanticVersion($version): bool
    {
        return (bool) preg_match('/^(0|[1-9]\d*)\.(0|[1-9]\d*)\.(0|[1-9]\d*)(?:-((?:0|[1-9]\d*|\d*[a-zA-Z-][0-9a-zA-Z-]*)(?:\.(?:0|[1-9]\d*|\d*[a-zA-Z-][0-9a-zA-Z-]*))*))?(?:\+([0-9a-zA-Z-]+(?:\.[0-9a-zA-Z-]+)*))?$/', (string) $version);
    }

    private static function readFileContents($filePath): ?string
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

    public static function getVersion(): ?string
    {
        $version = self::readFileContents(self::PATH_VERSION_FILE);

        if ($version === null || !self::isSemanticVersion($version)) {
            return null;
        }

        return $version;
    }
}
