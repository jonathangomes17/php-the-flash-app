<?php

namespace App\Modules\TheFlashApp\Application\EventSubscriber;

use App\Infrastructure\Contracts\EventInterface;
use App\Modules\TheFlashApp\Application\Event\ExampleSecondEvent;
use App\Modules\TheFlashApp\Application\Event\ExampleThirdEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use App\Modules\TheFlashApp\Application\Event\ExampleEvent;

/**
 * Class MailSubscriber
 *
 * @package  App\Modules\TheFlashApp\Application\EventSubscriber
 */
class MailSubscriber implements EventSubscriberInterface
{
    /**
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return [
            ExampleEvent::NAME       => 'onCaptureExampleOneEvent',
            ExampleSecondEvent::NAME => 'onCaptureExampleSecondEvent',
            ExampleThirdEvent::NAME  => 'onCaptureExampleThirdEvent',
        ];
    }

    /**
     * @param EventInterface $event
     */
    public function onCaptureExampleOneEvent(EventInterface $event): void
    {
        /** @var ExampleEvent $event */
        /**
         * $view = $event->getView()->getName();
         */
        // TODO: Do what you want with the dice
    }

    public function onCaptureExampleSecondEvent(EventInterface $event): void
    {
        /** @var ExampleEvent $event */
        /**
         * $view = $event->getView()->getName();
         */
        // TODO: Do what you want with the dice
    }

    public function onCaptureExampleThirdEvent(EventInterface $event): void
    {
        /** @var ExampleEvent $event */
        /**
         * $view = $event->getView()->getName();
         */
        // TODO: Do what you want with the dice
    }
}
