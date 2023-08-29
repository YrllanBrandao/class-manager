<?php

namespace App\Controllers;

use App\Models\UserModel;
use MF\Controller\Action;

class UserController extends Action
{

    public function register()
    {
        $this->render('register');
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
        $this->render('users', $array_users);
    }
}
