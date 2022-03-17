<?php

declare(strict_types=1);

namespace App\Manager;

use PDO;

final class Database
{
    private static ?PDO $pdo = null;

    public static function getConnection(): PDO
    {
        if (self::$pdo === null) {
            self::$pdo = new PDO(sprintf('sqlite:%s', __DIR__ . '/../../database.db'));
        }

        return self::$pdo;
    }
}
