<?php
namespace Mattsmithdev;

class ProductRepository
{
    private \PDO $connection;

    public function setConnection($connection)
    {
        $this->connection = $connection;
    }

    public function __construct($db)
    {
//        $db = new Database();
        $this->connection = $db->getConnection();

//        if(null == $this->connection){
//            die('there was an error connection to the database');
//        }
    }


    public function findAll()
    {
        $sql = 'SELECT * FROM product';

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'Mattsmithdev\\Product');

        $products = $stmt->fetchAll();

        return $products;
    }

    public function find($id)
    {
        $sql = 'SELECT * FROM product WHERE id = :id';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'Mattsmithdev\\Product');

        $products = $stmt->fetch();

        return $products;
    }

    public function createTable(): void
    {
        $sql = 'CREATE TABLE IF NOT EXISTS product ('
            . 'id integer PRIMARY KEY AUTO_INCREMENT,'
            . 'description text,'
            . 'price float'
            . ')';
        $this->connection->exec($sql);
    }

    public function dropTable(): void
    {
        $sql = 'DROP table product';
        $this->connection->exec($sql);
    }


    public function insert($description, $price): bool
    {
        // Prepare INSERT statement to SQLite3 file db
        // no ID since that is AUTO-INCREMENTED by DB
        $sql = 'INSERT INTO product (description, price) VALUES (:description, :quantity)';
        $stmt = $this->connection->prepare($sql);

        // Bind parameters to statement variables
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':quantity', $price);

        // Execute statement
        $noError = $stmt->execute();

        if($noError){
            return $this->connection->lastInsertId();
        } else {
            return false;
        }
    }




}