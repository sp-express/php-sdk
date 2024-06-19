<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(SetList::PHP_82);
    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_82,
        SetList::TYPE_DECLARATION,
    ]);
};
