<?php

namespace App\Models;

use App\Connection;
use \PDO;
use \PDOException;


class RoleModel{
    private $connection;

    public function __construct(){
         $newConnection = new Connection;
        $this -> setConnection($newConnection -> getDatabase());
    }
    public function setConnection($connection){
        $this -> connection = $connection;
    }
    public function getConnection(){
        return $this -> connection;
    }
    public function saveRole(){
           try{
            if(!isset($_POST['newRole']) || !isset($_POST['description'])){
                header("Location: /admin/role/create-role?status=400");
                exit;
            }
            $role = $_POST['newRole'];
            $description = $_POST['description'];

            $sql = '
                INSERT INTO roles(name, description) VALUES (:name, :description)
            ';

            $connection = $this -> getConnection();
            $statement = $connection -> prepare($sql);
            $statement -> bindParam(":name", $role);
            $statement -> bindParam(":description", $description);
            $statement -> execute();
            header('Location: /admin/role/create-role?status=201');
           }
           catch(PDOException $error){
            header('Location: /admin/role/create-role?status=500');

           }

    }
    public function getAll(){
        try{
            $connection = $this -> getConnection();

            $sql = '
            SELECT * FROM roles;
            ';

            $statement = $connection -> query($sql);
            
            $roles = $statement -> fetchAll();
            return $roles;

        }
        catch(PDOException $error){
            header("Location: /admin/roles&status=500");
        }
    }
}