<?php

namespace Quidco\DbSampler\Database;

use Doctrine\DBAL\Connection;

class DriverFactory
{
    public static function getDriver(Connection $connection): Driver
    {
        switch (\get_class($connection->getDriver())) {
            case \Doctrine\DBAL\Driver\PDO\MySQL\Driver::class:
                return new MySqlDriver($connection);
            case \Doctrine\DBAL\Driver\PDO\SQLite\Driver::class:
                return new SqliteDriver($connection);
            default:
                throw new \RuntimeException("Unknown database driver");
        }
    }
}
