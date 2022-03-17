<?php

declare(strict_types=1);

namespace App\Controller;

use App\Manager\PostManager;
use Symfony\Component\HttpFoundation\Response;

final class HomeController extends AbstractController
{
    public function home(): Response
    {
        $postManager = new PostManager();

        $posts = $postManager->findAll();

        return $this->render('home.php', ['posts' => $posts]);
    }
}
