<?php

namespace App;

use \Tools\Init\Bootstrap;

class Route extends Bootstrap
{
    protected function initRoutes()
    {
        $routes['home'] = array(
            'route' => '/', 'controller' => 'indexController', 'action' => 'index'
        );
        $routes['contact'] = array(
            'route' => '/contact', 'controller' => 'indexController', 'action' => 'contact'
        );
        $routes['create'] = array(
            'route' => '/create', 'controller' => 'indexController', 'action' => 'create'
        );
        $routes['update'] = array(
            'route' => '/update', 'controller' => 'indexController', 'action' => 'update'
        );

        $routes["delete"] = array(
            'route' => '/delete', 'controller' => 'indexController', 'action' => 'delete'
        );

        $this->setRoutes($routes);
    }

}