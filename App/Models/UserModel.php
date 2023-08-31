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

        $emailRegex = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
        
        $passwordLength = strlen($unhashedPassword);
        if($passwordLength < 8)
        {
            header("location: /register?error=411");
        }
        else if(!empty($username) && !empty($email) && !empty($unhashedPassword) && !empty($role) && preg_match($emailRegex, $email)) {
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

            // retrieve the user data
            $query = 'SELECT id from users where email = :email';
            $statement = $this -> connection -> prepare($query);
            $statement -> bindParam(":email", $email);
            $statement -> execute();
            $user = $statement -> fetch();
            $userId = $user['id'];

            
            // register role
            $query = 'INSERT INTO user_role(user_id, role_id) VALUES(:userId, :roleId)';
            $statement = $this -> connection -> prepare($query);
            $statement -> bindParam(":userId", $userId);
            $statement -> bindParam(":roleId", $role);
            $statement -> execute();
         

            header("location: /login?created=true");
            
        
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

    public function getUsers(){
      try{
        $query = '
        SELECT * FROM users
        ';

        $statement  = $this -> connection -> query($query);
        $users = $statement -> fetchAll(PDO::FETCH_ASSOC);
        return $users;
      }
      catch(PDOException $error){
        echo $error;
      }
        
    }
    public function getUser($userId){
        $sql = '
        SELECT  email, username, id FROM users WHERE id = ' . $userId;
        $statement = $this -> connection ->  query($sql);

        $user = $statement -> fetch(PDO::FETCH_ASSOC);
        return $user;

    }
    public function  updateUser(array $user){

        // updating user role
        $sqlRoleUpdate = '
        UPDATE user_role SET role_id = :roleId WHERE user_id = :userId
        ';

       
        $statement = $this -> connection -> prepare($sqlRoleUpdate);
        $statement -> bindParam(":roleId", $user['role']);
        $statement -> bindParam(":userId", $user['id']);

        $statement -> execute();
        // updating user
        $sqlUser = '
        UPDATE users SET username = :username, email = :email WHERE id = :userId
        ';
        $statement = $this -> connection -> prepare($sqlUser);
        $statement -> bindParam(":email",  $user['email']);
        $statement -> bindParam(":username",  $user['username']);
        $statement -> bindParam(":userId", $user['id']);

        $statement -> execute();

        header("Location: /home?status=200&message=usuário%20atualizado!");

    }
    public function deleteUser(int $userId){
        try{
            $sql = '
            DELETE FROM user_role where user_id = :id
            ';
            $statement = $this -> connection -> prepare($sql);

            $statement -> bindParam(':id', $userId);

            $statement -> execute();

            $sql = '
            DELETE FROM users where id = :id
            ';
            $statement = $this -> connection -> prepare($sql);

            $statement -> bindParam(':id', $userId);

            $statement -> execute();


            header("Location: /admin/users?status=200");

        }
        catch(PDOException $error){
            
            header("Location: /admin/users?status=500");
        }
    }
}