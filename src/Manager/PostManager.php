<?php

declare(strict_types=1);

namespace App\Manager;

use App\Model\Post;
use DateTime;
use PDO;

final class PostManager
{
    /**
     * @return array<array-key, Post>
     */
    public function findAll(): array
    {
        $pdo = Database::getConnection();

        $statement = $pdo->prepare('SELECT * FROM post');

        $statement->execute();

        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($posts as &$post) {
            $post = new Post(
                $post['id'],
                $post['title'],
                $post['content'],
                (new DateTime())->setTimestamp($post['published_at']),
            );
        }

        return $posts;
    }
}
