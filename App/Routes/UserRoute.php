<?php   
    namespace App\Routes;

    use App\Routes\AbstractRoute;

    class UserRoute extends AbstractRoute{   
        public function setRoutes(){
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
            $this -> routes = $routes;
        }

        public function getRoutes(){
            return $this -> routes;
        }
    }