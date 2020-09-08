<?php

declare(strict_types=1);

namespace App\Modules\TheFlashApp\Controller\Session;

use App\Infrastructure\Controller;
use App\Infrastructure\Template;
use Exception;

/**
 * Class LoginController
 *
 * @package App\Modules\TheFlashApp\Controller\Session
 */
final class LoginController extends Controller
{
    /**
     * @param array|null $params
     *
     * @return Template
     * @throws Exception
     */
    public function index(?array $params): Template
    {
        return Template::view('pages.session.login', [], 'login');
    }
}
