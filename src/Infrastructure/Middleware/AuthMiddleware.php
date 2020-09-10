<?php

declare(strict_types=1);

namespace App\Infrastructure\Middleware;

use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Exception;
use Throwable;

/**
 * Class AuthMiddleware
 *
 * @package App\Infrastructure\Middleware
 */
final class AuthMiddleware
{
    /**
     * @param int|null    $id
     * @param int|null    $role
     * @param int|null    $time
     * @param string|null $iss
     *
     * @return string
     */
    public static function generate(
        ?int $id = null,
        ?int $role = null,
        ?int $time = null,
        ?string $iss = 'The Flash App'
    ): string {

        return JWT::encode(
            [
                "iat"            => time(),
                "iss"            => $iss,
                "retrieve_token" => $_ENV['JWT_RETRIEVE_TOKEN'],
                "exp"            => $time ?? time() + intval($_ENV['JWT_EXPIRATION']),
                "id"             => $id,
                "role"           => $role
            ],
            $_ENV['JWT_KEY'],
            $_ENV['JWT_ALGORITHM']
        );
    }

    /**
     * @param string|null $token
     *
     * @return object
     * @throws Exception
     */
    public static function validate(?string $token)
    {
        if (!$token) {
            throw new Exception('invalid_token', 401);
        }

        try {
            $decoded = AuthMiddleware::decoded($token);

            if ($decoded->refresh_token !== $_ENV['JWT_RETRIEVE_TOKEN']) {
                throw new Exception('invalid_token', 401);
            }

            return $decoded;
        } catch (ExpiredException $expiredException) {
            throw new Exception('expired_token', 401);
        } catch (Throwable $e) {
            throw new Exception('invalid_token', 401);
        }
    }

    /**
     * @param string $token
     *
     * @return null|object
     */
    public static function decoded(string $token)
    {
        if (!$token) {
            return null;
        }

        return JWT::decode($token,
            $_ENV['JWT_KEY'],
            [
                $_ENV['JWT_ALGORITHM']
            ]
        );
    }
}
