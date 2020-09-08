<?php

declare(strict_types=1);

namespace App\Infrastructure;

use App\Infrastructure\Http\Request;
use Throwable;

/**
 * Class Template
 *
 * @package App\Infrastructure
 */
class Template
{
    public static $extension = '.html.twig';

    public static $rootPath = APP_ROOT . '/resources/views' ?? '../resources/views';

    private $file;

    private $slug;

    private $params;

    /**
     * Template constructor.
     *
     * @param string $file
     * @param string $slug
     * @param array  $params
     */
    private function __construct(string $file, array $params = [], string $slug = '')
    {
        $this->file   = $file;
        $this->slug   = $slug;
        $this->params = $params;
    }

    /**
     * @param string $file
     * @param string $slug
     * @param array  $params |null
     *
     * @return Template
     */
    public static function view(string $file, ?array $params = [], string $slug = ''): Template
    {
        return new self($file, $params, $slug);
    }

    /**
     * @param bool $return
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function render(bool $return = false)
    {
        $loader = new \Twig\Loader\FilesystemLoader(self::$rootPath);

        $twig = new \Twig\Environment($loader);

        $this->addFunctions($twig);

        try {
            $file = str_replace('.', '/', $this->file) . Template::$extension;

            if (!$return) {
                echo $twig->render($file, $this->mountParams());
            } else {
                return $twig->render($file, $this->mountParams());
            }
        } catch (Throwable $e) {
            echo $twig->render('404' . Template::$extension, $this->mountParams());
        }
    }

    /**
     * @return array
     */
    private function mountParams(): array
    {
        return array_merge(['page' => ['slug' => $this->slug]], $this->params);
    }

    /**
     * @param \Twig\Environment $twig
     */
    private function addFunctions(\Twig\Environment &$twig)
    {
        $twig->addFunction(new \Twig\TwigFunction('isAdmin', function (): bool {
            return Cookie::isAdmin();
        }));

        $twig->addFunction(new \Twig\TwigFunction('currency', function (float $price): string {
            return "R$ " . number_format($price, 2, ",", ".");
        }));

        $twig->addFunction(new \Twig\TwigFunction('date', function (string $date): string {
            if ($date == 'null') {
                return '';
            }

            return date("d/m/Y", strtotime($date));
        }));

        $twig->addFunction(new \Twig\TwigFunction('cdn', function (string $url): string {

            if ($_ENV['APP_ENV'] === 'development') {
                return $url;
            }

            if (!$token = $_ENV['CLOUDIMAGE_TOKEN']) {
                return $url;
            }

            $request = Request::singleton();

            $url = $request->getFullUrl() . $url;

            return "https://$token.cloudimg.io/v7/$url";
        }));
    }
}
