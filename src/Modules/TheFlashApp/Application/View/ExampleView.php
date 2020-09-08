<?php

declare(strict_types=1);

namespace App\Modules\TheFlashApp\Application\View;

use App\Infrastructure\View;

/**
 * Class ExampleView
 *
 * @package App\Modules\TheFlashApp\Application\View
 */
final class ExampleView extends View
{
    /**
     * @var string $name
     */
    private $name;

    /**
     * ExampleView constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param array $params
     *
     * @return ExampleView
     */
    public static function fromArray(array $params): ExampleView
    {
        return new self($params['name'] ?? 'Okay!');
    }

    /**
     * @return array
     */
    public function serialize(): array
    {
        return [
            'testing' => $this->name
        ];
    }
}
