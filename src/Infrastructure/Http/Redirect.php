<?php

declare(strict_types=1);

namespace App\Infrastructure\Http;

/**
 * Class Redirect
 *
 * @package App\Infrastructure\Http
 */
class Redirect
{
    /**
     * @param string $route
     */
    public static function from(string $route)
    {
        header('Location:' . $route);
        exit();
    }
}
