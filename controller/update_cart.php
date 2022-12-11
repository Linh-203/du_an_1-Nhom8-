<?php
    session_start();
    include "../model/connect.php";
    $id= $_GET["id"];
    $type = $_GET["type"];
    $query =  "SELECT * FROM products where id = $id";
    $products = getOne($query);
    $alert="";
    $color = $_GET["color"];
    // var_dump($_SESSION["cart"][$color]);die;
    if($type === "decre"){
        if($_SESSION["cart"][$color.$id]["quantity"]>1){       
            $_SESSION["cart"][$color.$id]["quantity"]--;
        }else{
        //    var_dump($_SESSION["cart"][0]);die;
            unset($_SESSION["cart"][$color.$id]);
        }
    }else{
   
         if( $_SESSION["cart"][$color.$id]["quantity"] >= $products["quantity"]){
             $_SESSION["cart"][$color.$id]["quantity"] = $products["quantity"];
             $alert ="Sản phẩm còn lại không đủ !";
           
         }else{

        $_SESSION["cart"][$color.$id]["quantity"]++;
         }
    }
    header("location: ../view/view_cart.php?id=$alert");

?>


