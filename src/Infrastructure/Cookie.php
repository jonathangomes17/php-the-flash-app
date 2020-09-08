<?php

declare(strict_types=1);

namespace App\Infrastructure;

/**
 * Class Cookie
 *
 * @package App\Infrastructure
 */
class Cookie
{
    /**
     * @return string|null
     */
    public static function getSession(): ?string
    {
        return array_key_exists('session', $_COOKIE)
            ? $_COOKIE['session'] ?? null
            : null;
    }

    /**
     * @return bool
     */
    public static function isAdmin(): bool
    {
        return array_key_exists('isAdmin', $_COOKIE)
            ? $_COOKIE['isAdmin'] == 'true'
            : false;
    }

    /**
     * @return string|null
     */
    public static function getFullName(): ?string
    {
        return array_key_exists('fullName', $_COOKIE)
            ? $_COOKIE['fullName'] ?? null
            : null;
    }
}
