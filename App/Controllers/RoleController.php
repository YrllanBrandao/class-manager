<?php

namespace App\Controllers;

use App\Models\RoleModel;
use MF\Controller\Action;

class RoleController extends Action
{
    public function createRole(){
        $role = new RoleModel;

        $this -> render("createRole");
    }
    public function saveRole(){
        $role = new RoleModel;

        $role -> saveRole();
    }
    public function getRoles(){
        $role = new RoleModel;
        $roles = $role -> getAll();
       
        $this-> render('roles', ["roles" => $roles]);
    }
}