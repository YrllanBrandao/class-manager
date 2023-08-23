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
            $routes['register'] = [
                'route' => '/register',
                'controller' => 'userController',
                'action' => 'register'
            ];
            $routes['registerUser'] = [
                'route' => '/admin/register-user',
                'controller' => 'userController',
                'action' => 'saveUser'
            ];

            $this -> setRoutes($routes);
        }
      
    }