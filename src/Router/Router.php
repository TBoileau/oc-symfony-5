<?php

declare(strict_types=1);

namespace App\Router;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class Router
{
    /**
     * @var array<array-key, Route>
     */
    public array $routes = [];

    public function add(string $path, string $controller, string $action): void
    {
        $this->routes[] = new Route($path, $controller, $action);
    }

    public function run(Request $request): Response
    {
        foreach ($this->routes as $route) {
            if ($route->matches($request->getRequestUri())) {
                return $route->execute();
            }
        }

        throw new RouteNotFoundException(sprintf('Not route found for %s', $request->getRequestUri()));
    }
}
