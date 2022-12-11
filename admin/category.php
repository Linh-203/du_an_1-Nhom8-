<?php
session_start();
if(empty($_SESSION["id"])){
    header("location:/du_an_1/login");
}
    include ("controller/c_category.php");
    $category = new c_category();
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        if($act == 'add'){
            $category->add_category();
        }elseif($act == "edit"){
            $category->edit_category(); 
        }elseif($act == 'delete'){
            $category->delete_category();
        }
    }else{
        $category->show_category(); 
    }
   
?>