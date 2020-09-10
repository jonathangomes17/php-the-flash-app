<?php

declare(strict_types=1);

namespace App\Modules\TheFlashApp\Handler\Test;

use App\Infrastructure\EventDispatcher;
use App\Infrastructure\Handler;
use App\Infrastructure\Http\Request;
use App\Infrastructure\Http\Response;
use App\Modules\TheFlashApp\Application\Event\ExampleEvent;
use App\Modules\TheFlashApp\Application\Event\ExampleSecondEvent;
use App\Modules\TheFlashApp\Application\Event\ExampleThirdEvent;
use App\Modules\TheFlashApp\Application\View\ExampleView;

/**
 * Class EventsHandler
 *
 * @package App\Modules\TheFlashApp\Handler
 */
class EventsHandler extends Handler
{
    /**
     * @param Request    $request
     * @param array|null $uriParams
     *
     * @return Response
     */
    public function handle(Request $request, ?array $uriParams): Response
    {
        // First event

        $exampleViewOne = new ExampleView('First event');

        $eventOne = new ExampleEvent($exampleViewOne);

        // Second event

        $exampleViewTwo = new ExampleView('Second event');

        $eventTwo = new ExampleEvent($exampleViewTwo);

        // Third event

        $exampleViewThree = new ExampleView('Third event');

        $eventThree = new ExampleEvent($exampleViewThree);

        // Adding events for final execution script

        EventDispatcher::pipe($eventOne, ExampleEvent::NAME);

        EventDispatcher::pipe($eventTwo, ExampleSecondEvent::NAME);

        EventDispatcher::pipe($eventThree, ExampleThirdEvent::NAME);

        // View of result

        return Response::json(new ExampleView('In processing events'));
    }
}
