<?php

declare(strict_types=1);

namespace App\Modules\TheFlashApp\Handler;

use App\Infrastructure\Handler;
use App\Infrastructure\Http\Request;
use App\Infrastructure\Http\Response;
use App\Modules\TheFlashApp\Application\View\ExampleView;

/**
 * Class PrivateHandler
 *
 * @package App\Modules\TheFlashApp\Handler
 */
class PrivateHandler extends Handler
{
    public function handle(Request $request, ?array $uriParams): Response
    {
        $exampleView = new ExampleView('Exemplo de View!');

        return Response::json($exampleView);
    }
}
