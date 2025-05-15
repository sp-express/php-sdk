<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(SetList::PHP_81);
    $rectorConfig->import(SetList::DEAD_CODE);
    $rectorConfig->import(SetList::CODE_QUALITY);
    $rectorConfig->import(SetList::CODING_STYLE);
};
