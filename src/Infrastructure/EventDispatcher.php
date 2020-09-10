<?php

declare(strict_types=1);

namespace App\Infrastructure;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class EventDispatcher
 *
 * @package App\Infrastructure
 */
abstract class EventDispatcher
{
    /**
     * @var array $dispatch
     */
    protected static $dispatch = [];

    /**
     * @param Event  $instance
     * @param string $eventName
     */
    public static function pipe(Event $instance, string $eventName)
    {
        self::$dispatch[$eventName] = $instance;
    }

    /**
     * @return array
     */
    public static function getEvents(): array
    {
        return self::$dispatch;
    }
}
