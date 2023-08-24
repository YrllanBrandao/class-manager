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
    public function saveUser()
    {
        $user = new UserModel;

        $user->createUser();

    }
    public function login()
    {
        $this->render('login');
    }
    public function authenticateUser()
    {
        $user = new UserModel;

        $user->authenticateUser();
    }

}
