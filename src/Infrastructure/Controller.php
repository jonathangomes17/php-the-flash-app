<?php

declare(strict_types=1);

namespace App\Infrastructure;

/**
 * Class Controller
 *
 * @package App\Infrastructure
 */
abstract class Controller
{
    /**
     * @param array|null $params
     *
     * @return Template
     */
    public abstract function index(?array $params): Template;
}