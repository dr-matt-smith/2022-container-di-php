<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Mattsmithdev\Database;
use Mattsmithdev\Product;
use Mattsmithdev\ProductRepository;

$db = new Database();
$productRepository = new ProductRepository($db);

// (1) drop then create table
$productRepository->dropTable();
$productRepository->createTable();

// (3) create & insert objects
$productRepository->insert('hammer', 9.99);
$productRepository->insert('bag of nails', 5);
////
////// (3) create objects
////// $m1 = new Product();
////// $m1->setTitle('Jaws');
////// $m1->setPrice(9.99);
////// $m1->setCategory('horror');
////
////// $m2 = new Product();
////// $m2->setTitle('Jumanji');
////// $m2->setPrice(9.99);
////// $m2->setCategory('entertainment');
////
////
////// (3) insert objects into DB
//////$productRepository->insert($m1);
//////$productRepository->insert($m2);
////
///
// (4) test objects are there
$products = $productRepository->findAll();
print '<pre>';
var_dump($products);
