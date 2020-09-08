<?php

namespace App\Modules\TheFlashApp\Domain\Entity;

use App\Infrastructure\Model;

/**
 * Class ExampleEntity
 *
 * @package App\Modules\TheFlashApp\Domain\Entity
 */
class ExampleEntity extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'example';

    /**
     * @var bool $timestamps
     */
    public $timestamps = false;

    /**
     * @var array $guarded
     */
    protected $guarded = [
        'id'
    ];

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'column1',
        'column2',
        'column3'
    ];
}
