<?php

    namespace App\Routes;

    class IndexRoute{
        private $routes;

        public function __construct(){
            $this -> setRoutes();
        }
        public function setRoutes(){
            $routes['index'] = [
                'route' => '/',
                'controller' => 'indexController',
                'action' => 'index'
            ];
            $this -> routes = $routes;
        }
        public function getRoutes(){
            return $this -> routes;
        }
    }