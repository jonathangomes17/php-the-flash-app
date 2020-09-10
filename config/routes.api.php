<?php

declare(strict_types=1);

use App\Modules\TheFlashApp\Handler\Test\EventsHandler;
use FastRoute\RouteCollector;
use App\Infrastructure\Router;
use App\Modules\TheFlashApp\Handler\PrivateHandler;
use App\Modules\TheFlashApp\Handler\PublicHandler;

return function (FastRoute\RouteCollector $r): void {
    $r->addGroup('/api', function (RouteCollector $r) {

        // Versão 1 das rotas

        $r->addGroup('/v1', function (RouteCollector $r) {

            // Api's públicas

            $r->get('/public', [PublicHandler::class, Router::$IS_PUBLIC]);

            // Api's privadas (Necessário enviar o Bearer Token gerado pelo JWT)

            $r->get('/private', PrivateHandler::class);


            $r->addGroup('/test', function (RouteCollector $r) {
                $r->get('/events', [EventsHandler::class, Router::$IS_PUBLIC]);
            });
        });
    });
};
