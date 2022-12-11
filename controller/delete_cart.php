<?php
     session_start();
     $id=$_GET["id"];
     unset($_SESSION["cart"][$id]);
     header("location:../view/view_cart.php?id=");
?>