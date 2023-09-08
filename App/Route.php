<?php
    namespace App;
    
    use MF\Init\Bootstrap;
    use App\Routes\UserRoute;
    use App\Routes\IndexRoute;
    use App\Routes\RoleRoute;
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
            $indexRoutes = new IndexRoute;
            $userRoutes = new UserRoute;
            $roleRoutes = new RoleRoute;
            $routes = self::mergeRoutes(
                $userRoutes -> getRoutes(), 
                $indexRoutes -> getRoutes(),
                $roleRoutes -> getRoutes()
             );
            $this -> setRoutes($routes);
        }
      
    }