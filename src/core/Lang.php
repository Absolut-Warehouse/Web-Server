<?php
namespace Core;

class Lang
{
    protected static array $lang = [];

    public static function init(string $langCode = 'fr'): void
    {
        $supported = ['fr', 'en'];
        if (!in_array($langCode, $supported)) $langCode = 'fr';
        self::$lang = include __DIR__ . "/../lang/$langCode.php";
    }

    public static function get(): array
    {
        return self::$lang;
    }
}