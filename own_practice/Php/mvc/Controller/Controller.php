<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
require_once('Model/Model.php');
class Controller extends Model{
    public function __construct()
    {
        parent::__construct();
        if(isset($_SERVER['PATH_INFO'])){
            var_dump($_SERVER);
            switch($_SERVER['PATH_INFO']){
                case '/index':
                    print('<pre>');
                    print_r($_SERVER);
                    echo "This is MVC Architecture.";
                    exit;
                     //include('../Views/hello.php');
                    break;
                default:
                     break;    
            }
        }
    }

}

$obj=new Controller();



?>