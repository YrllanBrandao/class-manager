<?php

namespace App\Routes;

use App\Routes\AbstractRoute;


class RoleRoute  extends AbstractRoute{
    public function setRoutes(){
        $routes['createRole'] = [
            'route' => '/admin/role/create-role',
            'controller' => 'roleController',
            'action' => 'createRole'
        ];
        $routes['saveRole'] = [
            'route' => '/admin/role/save-role',
            'controller' => 'roleController',
            'action' => 'saveRole'
        ];
        $routes['getRoles'] = [
            'route' => '/admin/roles',
            'controller' => 'roleController',
            'action' => 'getRoles'
        ];
        $this -> routes = $routes;
    }
    public function getRoutes(){
        return $this -> routes;
    }
}