<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractController
{
    protected function render(string $view, array $data = []): Response
    {
        extract($data);
        ob_start();
        require(__DIR__ . '/../../templates/' . $view);
        $content = ob_get_clean();

        ob_start();
        require(__DIR__ . '/../../templates/base.php');
        $content = ob_get_clean();

        return new Response($content);
    }

    protected function redirect(string $url): RedirectResponse
    {
        return new RedirectResponse($url);
    }
}
