<?php

namespace App\Enums;

enum WineType: int
{
    case RED = 0;
    case WHITE = 1;
    case ROSE = 2;
    case SPARKLING = 3;
    case DESSERT = 4;

    public static function name($wineType): string
    {
        return match ($wineType) {
            self::RED => 'Red',
            self::WHITE => 'White',
            self::ROSE => 'Rose',
            self::SPARKLING => 'Sparkling',
            self::DESSERT => 'Dessert',
        };
    }
}
