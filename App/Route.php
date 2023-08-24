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
            $routes['loginUser'] = [
                'route' => '/login',
                'controller' => 'userController',
                'action' => 'login'
            ];
            $routes['authenticateUser'] = [
                'route' => '/authentication',
                'controller' => 'userController',
                'action' => 'authenticateUser'
            ];
            $this -> setRoutes($routes);
        }
      
    }