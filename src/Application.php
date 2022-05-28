<?php

namespace Mattsmithdev;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;



class Application
{
    private $mainController;

    public function __construct()
    {
        $container = new ContainerBuilder();
        $pathToYamlSettings = __DIR__ . '/..';
        $loader = new YamlFileLoader($container, new FileLocator($pathToYamlSettings));
        $loader->load('services.yaml');

        $this->mainController = new MainController($container);
    }

    public function run()
    {
        $action = filter_input(INPUT_GET, 'action');

        switch($action){
            case 'show':
                $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
                $this->mainController->showAction($id);
                break;

            case 'list':
                $this->mainController->listAction();
                break;

            case 'home':
            default:
                $this->mainController->homeAction();
        }
    }
}
