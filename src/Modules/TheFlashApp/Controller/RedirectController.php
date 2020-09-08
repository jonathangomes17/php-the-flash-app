<?php

declare(strict_types=1);

namespace App\Modules\TheFlashApp\Controller;

use App\Infrastructure\Controller;
use App\Infrastructure\Http\Redirect;
use App\Infrastructure\Template;
use Exception;

/**
 * Class RedirectController
 *
 * @package App\Modules\TheFlashApp\Controller
 */
final class RedirectController extends Controller
{
    /**
     * @param array|null $params
     *
     * @return Template
     * @throws Exception
     */
    public function index(?array $params): Template
    {
        Redirect::from('/example');
    }
}
