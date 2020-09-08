<?php

declare(strict_types=1);

use FastRoute\RouteCollector;
use App\Infrastructure\Router;
use App\Modules\TheFlashApp\Controller\ExampleController;
use App\Modules\TheFlashApp\Controller\HomeController;
use App\Modules\TheFlashApp\Controller\RedirectController;
use App\Modules\TheFlashApp\Controller\Session\LoginController;
use App\Modules\TheFlashApp\Controller\Session\LogoutController;
use App\Modules\TheFlashApp\Controller\PrivacyPolicyController;

return function (FastRoute\RouteCollector $r): void {

    // Rotas públicas (que não precisam do JWT Token)

    $r->get('/privacy-policy', [PrivacyPolicyController::class, Router::$IS_PUBLIC]);
    $r->get('/redirect', [RedirectController::class, Router::$IS_PUBLIC]);
    $r->get('/login', [LoginController::class, Router::$IS_PUBLIC]);
    $r->get('/example', [ExampleController::class, Router::$IS_PUBLIC]);

    // Agrupamento de rotas

    $r->addGroup('/', function (RouteCollector $r) {
        $r->get('', [HomeController::class, Router::$IS_PUBLIC]);
    });

    // Rotas privadas (que precisam estar logadas com JWT Token)

    $r->get('/logout', LogoutController::class);
    $r->get('/example-private', ExampleController::class);
};
