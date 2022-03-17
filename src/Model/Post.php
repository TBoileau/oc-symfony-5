<?php

declare(strict_types=1);

namespace App\Model;

use DateTime;

class Post
{
    public int $id;

    public string $title;

    public string $content;

    public DateTime $publishedAt;

    public function __construct(int $id, string $title, string $content, DateTime $publishedAt)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->publishedAt = $publishedAt;
    }
}
