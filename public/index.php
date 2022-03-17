<?php

use App\Controller\HomeController;
use App\Router\Router;
use Symfony\Component\HttpFoundation\Request;

require __DIR__.'/../vendor/autoload.php';

$request = Request::createFromGlobals();

$router = new Router();

$router->add('/', HomeController::class, 'home');

$response = $router->run($request);

$response->send();
