<?php

namespace App\Modules\TheFlashApp\Application\Event;

use App\Modules\TheFlashApp\Application\View\ExampleView;
use Symfony\Contracts\EventDispatcher\Event;
use App\Infrastructure\Contracts\EventInterface;

/**
 * Class ExampleSecondEvent
 *
 * @package App\Modules\TheFlashApp\Application\Event
 */
class ExampleSecondEvent extends Event implements EventInterface
{
    public const NAME = 'the-flash-app.example-second';

    /**
     * @var ExampleView
     */
    private $exampleView;

    /**
     * ExampleTestEvent constructor.
     *
     * @param ExampleView $exampleView
     */
    public function __construct(ExampleView $exampleView)
    {
        $this->exampleView = $exampleView;
    }

    /**
     * @return ExampleView
     */
    public function getView(): ExampleView
    {
        return $this->exampleView;
    }
}
