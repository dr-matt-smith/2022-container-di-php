<?php
namespace Mattsmithdev;

class Database
{
    const DB_NAME = 'evote';
    const DB_USER = 'root';
    const DB_PASS = 'passpass';
    const DB_HOST = 'localhost:3306';

    private \PDO $connection;

    public function getConnection()
    {
        return $this->connection;
    }

    public function __construct()
    {
        $dsn = 'mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_HOST;
        try {
            $this->connection = new \PDO(
                $dsn,
                self::DB_USER,
                self::DB_PASS
            );
        } catch (\Exception $e){
            print 'EXCEPTION OCCURRED';
            print $e->getMessage();
        }
    }

}