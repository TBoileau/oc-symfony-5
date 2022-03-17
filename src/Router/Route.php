<?php

declare(strict_types=1);

namespace App\Router;

use Symfony\Component\HttpFoundation\Response;

final class Route
{
    public string $path;

    public string $controller;

    public string $action;

    public array $matches;

    public function __construct(string $path, string $controller, string $action)
    {
        $this->path =  $path;
        $this->controller = $controller;
        $this->action = $action;
    }

    public function matches(string $url): bool
    {
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $pathToMatch = "#^$path$#";

        if (preg_match($pathToMatch, $url, $matches)) {
            $this->matches = $matches;
            return true;
        }

        return false;
    }

    public function execute(): Response
    {
        $controller = new $this->controller();
        $method = $this->action;
        return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method();
    }
}