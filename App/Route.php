<?php
    namespace App;
    
    use MF\Init\Bootstrap;
 
    class Route extends Bootstrap{
        public function initRoutes(){
            $routes['home'] = [
                'route' => '/',
                'controller' => 'indexController',
                'action' => 'index'
            ];
            $routes['login'] = [
                'route' => '/login',
                'controller' => 'indexController',
                'action' => 'login'
            ];

            $this -> setRoutes($routes);
        }
      
    }