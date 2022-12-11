<?php 
     $url = isset($_GET["url"]) ? $_GET["url"] : "/";
     include "./controller/c_home.php";
      
     switch($url){
        case "/":
        case "home":
            render();
        
        default :
             
     }





?>