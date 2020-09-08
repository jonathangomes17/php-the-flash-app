<?php

declare(strict_types=1);

namespace App\Infrastructure;

/**
 * Class File
 *
 * @package App\Infrastructure
 */
class File
{
    /**
     * @param string $data
     * @param string $directory
     *
     * @return string
     */
    public static function copy(string $data, string $directory = '/files'): string
    {
        $hash = hash_file('sha256', $data);

        $file = getcwd() . "{$directory}/{$hash}";

        file_put_contents($file, file_get_contents($data));

        return $hash;
    }

    /**
     * @param string $hash
     * @param string $directory
     *
     * @return bool
     */
    public static function remove(string $hash, string $directory = '/files'): bool
    {
        return unlink(getcwd() . "{$directory}/{$hash}");
    }

    /**
     * @param string $hash
     * @param string $directory
     *
     * @return bool
     */
    public static function exists(string $hash, string $directory = '/files'): bool
    {
        return file_exists(getcwd() . "{$directory}/{$hash}");
    }
}
