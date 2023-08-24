<?php

namespace App\Models;

use App\Connection;
use \PDO;
use \PDOException;

class UserModel{
    private $connection;
    public function __construct(){
        $con = new Connection;
        $this -> connection =  $con -> getDatabase();
    }
    
    private function getRole($id){
             $query =   '
        SELECT roles.*
FROM user_role
JOIN roles ON user_role.role_id = roles.id
WHERE user_role.user_id = :id
        ';
        $statement = $this -> connection -> prepare($query);
        $statement -> bindParam(":id", $id);

        $statement -> execute();

        $role = $statement -> fetch(PDO::FETCH_ASSOC);

        return $role['name'];
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

    public function AuthenticateUser(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordLength = strlen($password);
        if($passwordLength < 8){
            header('location: /login?error=411');
        }
        else if(!empty($email) && !empty($password))
        {
            try{
                $query = '
                SELECT id, username, email, password FROM users WHERE email = :email
                ';
                $statement = $this -> connection -> prepare($query);
                $statement -> bindParam(':email', $email);
                $statement -> execute();
               
                $user = $statement -> fetch(PDO::FETCH_ASSOC);

                $samePassword = password_verify($password, $user['password']);

                if($samePassword){
                    $userId = $user['id'];

                    $role = $this -> getRole($userId);
                  
                    $_SESSION['username'] = $user['username'];
                   $_SESSION['role'] = $role;

                   header("location: /home");
                }
                else{
                    header("location: /login?error=400");
                }
            }
            catch(PDOException  $error){
                header('location: /login?error=500');
            }
        }
        else{
            header('location: /login?error=400');
        }
    }

    public function logout(){
        session_destroy();
        session_write_close();
        header("location: /login");
    }
}