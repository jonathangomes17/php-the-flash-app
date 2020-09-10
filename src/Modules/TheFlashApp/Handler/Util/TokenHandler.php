<?php

declare(strict_types=1);

namespace App\Modules\TheFlashApp\Handler\Util;

use App\Modules\TheFlashApp\Application\View\ExampleView;
use App\Modules\TheFlashApp\Application\View\Util\TokenView;
use Firebase\JWT\JWT;
use App\Infrastructure\Handler;
use App\Infrastructure\Http\Request;
use App\Infrastructure\Http\Response;

/**
 * Class TokenHandler
 *
 * @package App\Modules\TheFlashApp\Handler
 */
class TokenHandler extends Handler
{
    /**
     * @param Request    $request
     * @param array|null $uriParams
     *
     * @return Response
     * @throws \Exception
     */
    public function handle(Request $request, ?array $uriParams): Response
    {
        $params = $request->getBody();

        $iss = $params['iss'] ?? 'The Flash App';

        $retrieveToken = $params['retrieve_token'] ?? null;

        $exp = $params['exp'] ?? time() + intval($_ENV['JWT_EXPIRATION']);

        $iat = time();

        $payload = [
            "iat" => $iat,
            "iss" => $iss,
            "exp" => $exp
        ];

        if ($retrieveToken) {
            $payload['refresh_token'] = $retrieveToken;
        }

        $secretKey = $params['secret_key'] ?? 'TheFlashApp@' . random_int(0, 99999999999) . '__' . ucfirst($_ENV['APP_ENV']);

        $algorithm = $params['algorithm'] ?? $_ENV['JWT_ALGORITHM'];

        $token = JWT::encode($payload, $secretKey, $algorithm);

        return Response::json(new TokenView(
            $iat,
            $iss,
            $exp,
            $retrieveToken,
            $secretKey,
            $algorithm,
            $token
        ));
    }
}
