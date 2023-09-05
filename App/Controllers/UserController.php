<?php

namespace App\Controllers;

use App\Models\UserModel;
use MF\Controller\Action;

class UserController extends Action
{

    public function register()
    {
        $this->render('/admin/register');
    }
    public function login()
    {
        $this->render('login');
    }
    public function home(){
        $this -> render('home');
    }
    public function saveUser()
    {
        $user = new UserModel;
        
        $user->createUser();
        
    }
    public function authenticateUser()
    {
        $user = new UserModel;

        $user->authenticateUser();
    }
    public function logout(){
        $user = new UserModel;

        $user -> logout();
    }
    public function users(){
        $user = new UserModel;
        $users = $user -> getUsers();
        $array_users = ['users' => $users];
        $this->render('/admin/users', $array_users);
    }

    public function saveUpdate(){
        $user = new UserModel;

        
        $userData = [
            'id' => (int) $_POST['userId'],
            'email' =>  $_POST['email'],
            'username' =>  $_POST['username'],
            'role' =>  $_POST['role'],
        ];

        $user -> updateUser($userData);
    }
    public function update(){
        $user = new UserModel;
        $userId = (int) $_POST['userId'];

        $userData = $user -> getUser($userId);

        $this -> render('update', $userData);
    }

    public function deleteUser(){
        $user = new UserModel;
        $userId = (int) $_POST['userId'];
        $user -> deleteUser($userId);
    }

   
}
