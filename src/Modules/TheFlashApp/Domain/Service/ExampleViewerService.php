<?php

declare(strict_types=1);

namespace App\Modules\TheFlashApp\Domain\Service;

use App\Modules\TheFlashApp\Domain\Repository\ExampleRepository;

/**
 * Class ExampleViewerService
 *
 * @package App\Modules\TheFlashApp\Domain\Service
 */
class ExampleViewerService
{
    /**
     * @param int $id
     *
     * @return mixed
     */
    public static function getExampleById(int $id)
    {
        return ExampleRepository::getExampleById($id);
    }
}
