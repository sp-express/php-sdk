<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(SetList::PHP_82);
    $rectorConfig->rules([
        Rector\Php80\Rector\FunctionLike\MixedTypeRector::class,
    ]);
    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_81,
        SetList::TYPE_DECLARATION,
    ]);


};
