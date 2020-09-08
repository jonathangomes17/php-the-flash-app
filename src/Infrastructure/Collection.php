<?php

declare(strict_types=1);

namespace App\Infrastructure;

use InvalidArgumentException;

/**
 * Class Collection
 *
 * @package App\Infrastructure
 */
class Collection
{
    /**
     * @var array $items
     */
    private $items = [];

    /**
     * @param      $obj
     * @param null $key
     */
    public function addItem($obj, $key = null)
    {
        if ($key == null) {
            $this->items[] = $obj;
        } else {
            if (isset($this->items[$key])) {
                throw new InvalidArgumentException("Key $key already in use.");
            } else {
                $this->items[$key] = $obj;
            }
        }
    }

    /**
     * @param $key
     */
    public function deleteItem($key)
    {
        if (isset($this->items[$key])) {
            unset($this->items[$key]);
        } else {
            throw new InvalidArgumentException("Invalid key $key.");
        }
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function getItem($key)
    {
        if (isset($this->items[$key])) {
            return $this->items[$key];
        } else {
            throw new InvalidArgumentException("Invalid key $key.");
        }
    }

    /**
     * @return array
     */
    public function keys()
    {
        return array_keys($this->items);
    }

    /**
     * @return int
     */
    public function length()
    {
        return count($this->items);
    }

    /**
     * @param $key
     *
     * @return bool
     */
    public function keyExists($key)
    {
        return isset($this->items[$key]);
    }

    /**
     * @return array|null
     */
    public function serialize(): ?array
    {
        $items = [];

        foreach ($this->items as $item) {
            $items[] = $item->serialize();
        }

        return $items;
    }
}
