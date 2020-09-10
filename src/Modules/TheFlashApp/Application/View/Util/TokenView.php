<?php

declare(strict_types=1);

namespace App\Modules\TheFlashApp\Application\View\Util;

use App\Infrastructure\View;

/**
 * Class TokenView
 *
 * @package App\Modules\TheFlashApp\Application\View\Util
 */
final class TokenView extends View
{
    /**
     * @var int
     */
    private $iat;

    /**
     * @var string
     */
    private $iss;

    /**
     * @var int
     */
    private $exp;

    /**
     * @var string
     */
    private $retrieveToken;

    /**
     * @var string
     */
    private $secretKey;

    /**
     * @var string
     */
    private $algorithm;

    /**
     * @var string
     */
    private $token;

    /**
     * TokenView constructor.
     *
     * @param int         $iat
     * @param string|null $iss
     * @param int         $exp
     * @param string      $retrieveToken
     * @param string      $secretKey
     * @param string      $algorithm
     * @param string      $token
     */
    public function __construct(
        int $iat,
        string $iss,
        int $exp,
        ?string $retrieveToken,
        string $secretKey,
        string $algorithm,
        string $token
    ) {
        $this->iat           = $iat;
        $this->iss           = $iss;
        $this->exp           = $exp;
        $this->retrieveToken = $retrieveToken;
        $this->secretKey     = $secretKey;
        $this->algorithm     = $algorithm;
        $this->token         = $token;
    }

    /**
     * @return array
     */
    public function serialize(): array
    {
        return [
            'iat'            => $this->iat,
            'iss'            => $this->iss,
            'exp'            => $this->exp,
            'retrieve_token' => $this->retrieveToken,
            'secret_key'     => $this->secretKey,
            'algorithm'      => $this->algorithm,
            'token'          => $this->token,
        ];
    }
}
