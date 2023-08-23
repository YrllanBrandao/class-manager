<?php

namespace App\Models;

use App\Connection;
use \PDOException;

class UserModel{
    private $connection;
    public function __construct(){
        $con = new Connection;
        $this -> connection =  $con -> getDatabase();
    }
    

    public function createUser(){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $unhashedPassword = $_POST['password'];
        $role = (int) $_POST['role'];

        $passwordLength = strlen($unhashedPassword);
        if($passwordLength < 8)
        {
            header("location: /register?error=411");
        }
        else if(!empty($username) && !empty($email) && !empty($unhashedPassword) && !empty($role)){
           try{
            $hashedPassword = password_hash($unhashedPassword, PASSWORD_DEFAULT);

            $query = '
            INSERT INTO users(username, email, password) VALUES (:username, :email, :password)
            ';
            $statement = $this -> connection -> prepare($query);

            $statement -> bindParam(":username", $username);
            $statement -> bindParam(":email", $email);
            $statement -> bindParam(":password", $hashedPassword);
            $statement -> execute();


        
           }
           catch(PDOException $error){
            $code = $error -> getCode();

            if($code == 23000)
            {
                header("location: /register?error=409");
            }
            else{
                header("location: /register?error=500");
            }
        }
        

        }
        else{
            header("location: /register?error=400");
        }

    }
}