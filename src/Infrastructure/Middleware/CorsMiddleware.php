<?php

namespace App\Infrastructure\Middleware;

use App\Infrastructure\Http\Request;
use Exception;

/**
 * Class Cors
 *
 * @package App\Infrastructure\Middleware
 */
abstract class CorsMiddleware
{
    /**
     * @param Request $request
     *
     * @throws Exception
     */
    public static function validate(Request $request): void
    {
        if (self::isBot($request)) {
            throw new Exception('cors_invalid');
        }

        if (!$request->isRequestApi()) {
            return;
        }

        if ($_ENV['APP_ENV'] !== 'production') {
            return;
        }

        $originsGranted = $_ENV['CORS_ORIGIN'];

        preg_match("/({$request->getOrigin()})/", $originsGranted, $origins);

        if (!$origins) {
            throw new Exception('cors_invalid');
        }

        header("Access-Control-Allow-Origin: $origins[0]");
    }

    /**
     * @param Request $request
     *
     * @return false|int
     */
    private static function isBot(Request $request): bool
    {
        if ($_ENV['APP_ENV'] !== 'production') {
            return false;
        }

        $pattern = '/bot|crawl|postman|curl|dataprovider|search|get|spider|find|java|majesticsEO|google|yahoo|teoma|contaxe|yandex|libwww-perl|facebookexternalhit/i';

        return boolval(preg_match($pattern, $request->getUserAgent()));
    }
}
