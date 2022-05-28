<?php

namespace Mattsmithdev;

use Symfony\Component\DependencyInjection\ContainerBuilder;


class Controller
{
    protected ?ContainerBuilder $container = null;

    public function __construct(ContainerBuilder $container)
    {
        $this->container = $container;
    }

}