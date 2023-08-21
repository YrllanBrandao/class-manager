<?php

namespace App;
use PDO;
use Dotenv\Dotenv;


class Connection{
    private $dsn;
    private $user;
    private $password;
    public function __construct(){
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv -> load();
        $this -> dsn = $_ENV['DB_DSN'];
        $this -> user = $_ENV['DB_ADMIN'];
        $this -> password = $_ENV['DB_PASSWORD'];

    }
    public static function getDatabase(){

       try{
        $connection = new PDO($this -> dsn, $this -> user, $this -> password);

        return $connection;
       }
       catch(PDOException $error){
        
       }
    }
}