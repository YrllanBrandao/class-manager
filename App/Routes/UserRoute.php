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
        
            // admin routes
            $routes['users'] = [
                'route' => '/admin/users',
                'controller' => 'userController',
                'action' => 'users'
            ];
            $routes['update'] = [
                'route' => '/admin/user/update',
                'controller' => 'userController',
                'action' => 'update'
            ];
            $routes['saveUpdate'] = [
                'route' => '/admin/user/save-update',
                'controller' => 'userController',
                'action' => 'saveUpdate'
            ];
            $routes['deleteUser'] = [
                'route' => '/admin/user/delete',
                'controller' => 'userController',
                'action' => 'deleteUser'
            ];

            $this -> routes = $routes;
        }

        public function getRoutes(){
            return $this -> routes;
        }
    }