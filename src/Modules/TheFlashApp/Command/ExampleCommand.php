<?php

declare(strict_types=1);

namespace App\Modules\TheFlashApp\Command;

use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ExampleCommand
 *
 * @package App\Modules\TheFlashApp\Command
 */
class ExampleCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:example')
            ->setDescription('Rotina de exemplo');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        throw new Exception('Rotina de exemplo');
    }
}
