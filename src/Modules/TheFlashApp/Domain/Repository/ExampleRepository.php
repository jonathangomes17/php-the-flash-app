<?php

namespace App\Modules\TheFlashApp\Domain\Repository;

use Throwable;
use App\Modules\TheFlashApp\Domain\Entity\ExampleEntity;
use App\Modules\TheFlashApp\Application\View\ExampleView;

/**
 * Class ExampleRepository
 *
 * @package App\Modules\TheFlashApp\Domain\Repository
 */
abstract class ExampleRepository
{
    /**
     * @param int  $exampleId
     * @param bool $entity
     *
     * @return mixed
     */
    public static function getExampleById(int $exampleId, bool $entity = false)
    {
        try {
            $user = ExampleEntity::where('id', $exampleId)->first();

            if (!$user) {
                return null;
            }

            return $entity ? $user : ExampleView::fromArray($user->toArray());

        } catch (Throwable $e) {
            return null;
        }
    }
}
