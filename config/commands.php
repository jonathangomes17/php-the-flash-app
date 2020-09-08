<?php

declare(strict_types=1);

use Symfony\Component\Console\CommandLoader\FactoryCommandLoader;
use App\Modules\TheFlashApp\Command\ExampleCommand;

return new FactoryCommandLoader([
    'app:example' => function () {
        return new ExampleCommand;
    }
]);
