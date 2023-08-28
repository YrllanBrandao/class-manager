<?php
    namespace App;
    
    use MF\Init\Bootstrap;
    use App\Routes\UserRoute;
    class Route extends Bootstrap{
        private static function mergeRoutes(){
            $mergedRoutes = [];
            $args = func_get_args();

            foreach($args as $array){
                $mergedRoutes += $array;
            }
            return $mergedRoutes;
        }
        public function initRoutes(){
            $indexRoutes['index'] = [
                'route' => '/',
                'controller' => 'indexController',
                'action' => 'index'
            ];
            $userRoutes = new UserRoute;
            $routes = self::mergeRoutes($userRoutes -> getRoutes(), $indexRoutes);
            $this -> setRoutes($routes);
        }
      
    }