<?php
    namespace App;


class Middeware{
    private $logged;

    public function __construct(){
        $logged = isset($_SESSION['role']);
        $this -> setLogged($logged);
    }
    public function next(){
    }
    public static function handle(string $role){
        
        if($this -> getLogged())
        {
            switch($role){
                case 'student':
    
                    return;
                case 'admin':
    
                    return;
    
                case 'professor':
    
    
                return;
                default: 
                header('Location: /login?error=403');
                break;
                ;
            }
           
        }
        else{
            header('Location: /login?error=403');
        }
        
        

    }
    public function getLogged(){
        return $this -> logged;
    }
    public function setLogged(boolean $value){
        return $this -> $value;
    }
}