<?php

declare(strict_types=1);

namespace App\Modules\TheFlashApp\Controller;

use App\Infrastructure\Controller;
use App\Infrastructure\Template;
use Exception;

/**
 * Class HomeController
 *
 * @package App\Modules\TheFlashApp\Controller
 */
final class HomeController extends Controller
{
    /**
     * @param array|null $params
     *
     * @return Template
     * @throws Exception
     */
    public function index(?array $params): Template
    {
        return Template::view('pages.home.index');
    }
}
