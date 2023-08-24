<?php
    namespace App;
    
    use MF\Init\Bootstrap;
 
    class Route extends Bootstrap{
        public function initRoutes(){
            $routes['index'] = [
                'route' => '/',
                'controller' => 'indexController',
                'action' => 'index'
            ];
            $routes['home'] = [
                'route' => '/home',
                'controller' => 'userController',
                'action' => 'home'
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
            $routes['logout'] = [
                'route' => '/logout',
                'controller' => 'userController',
                'action' => 'logout'
            ];
            $this -> setRoutes($routes);
        }
      
    }