<?php
session_start();
if(empty($_SESSION["id"])){
    header("location:/du_an_1/login");
}
    include ("controller/c_user.php");
    $user = new c_user();

    if(isset($_GET['act'])){
        $act = $_GET['act'];
        if($act == 'add'){
            $user->add_user(); 
        }elseif($act == "edit"){
            $user->edit_user(); 
        }elseif($act == "delete"){
            $user->delete_user();
        }
    }else{
        $user->show_user();
    }
?>