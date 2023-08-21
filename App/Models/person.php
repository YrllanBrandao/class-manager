<?php

namespace App\Models;
use App\Connection;
class Person{
    private $connection;
    public function __construct(){
        $this -> connection = Connection::getDatabase();
    }
}