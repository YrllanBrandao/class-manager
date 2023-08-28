<?php

namespace App\Routes;

abstract class AbstractRoute{
    public function __construct(){
        $this -> setRoutes();
    }
    abstract public function setRoutes();
    abstract public function getRoutes();
}