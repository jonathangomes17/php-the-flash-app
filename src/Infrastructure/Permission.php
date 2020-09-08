<?php

declare(strict_types=1);

namespace App\Infrastructure;

use App\Infrastructure\Middleware\AuthMiddleware;
use Exception;

/**
 * Class Permission
 *
 * @package App\Infrastructure
 */
class Permission
{
    /**
     * @return bool
     */
    public static function isAdminBySession(): bool
    {
        $decoded = AuthMiddleware::decoded(Cookie::getSession());

        return $decoded && $decoded->isAdmin === true;
    }

    /**
     * @return bool
     */
    public static function isGuest(): bool
    {
        return (bool)Cookie::getSession() === false;
    }

    /**
     * @param int $id
     *
     * @throws Exception
     */
    public static function isUserAuthorized(int $id)
    {
        if ($token = Cookie::getSession()) {
            $decoded = AuthMiddleware::decoded($token);

            if ($decoded->isAdmin === false && $decoded->id !== $id) {
                throw new Exception('user_unauthorized', 401);
            }
        }
    }
}
