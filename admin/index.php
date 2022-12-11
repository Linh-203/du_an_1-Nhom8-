<?php
 session_start();
 if(!empty($_SESSION["id"])){
    include ("controller/c_index.php");
    $index = new c_index();
    $index->index();

 }else{
    header("location:/du_an_1/login");

 }


 
?>
