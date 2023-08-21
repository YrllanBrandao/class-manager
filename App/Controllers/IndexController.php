<?php 

namespace App\Controllers;


    use MF\Controller\Action;

    class IndexController extends  Action{        
        public function index(){
            $this -> render('home');
        }
        public function login(){
           $this -> render('login');
        }
        public function register(){
            $this -> render('register');
        }
        
    }
