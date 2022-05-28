<?php

namespace Mattsmithdev;

use Mattsmithdev\ProductRepository;

class MainController extends Controller
{

    public function listAction()
    {
        $productRepository = $this->container->get('ProductRepository');
        $products = $productRepository->findAll();

        include __DIR__ . '/../templates/list.php';
    }

    public function showAction($id)
    {
        $productRepository = $this->container->get('ProductRepository');
        $product = $productRepository->find($id);

        print $product;
    }

        public function homeAction()
    {
        include __DIR__ . '/../templates/homepage.php';
    }

}
