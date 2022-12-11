<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
 
</head>
<body>
  
</body>
</html>
<?php
    include "../model/connect.php"; 
    session_start();
    //  unset($_SESSION["cart"]);
    // ob_start();
    $id = $_GET["id"];
    $color =$_SESSION["color"];
    echo "<pre>";
    var_dump( $_SESSION["cart"]);
    
    if(empty($_SESSION["cart"][$color.$id]) ){
        $query = "SELECT * FROM products where id=$id";
        $product= getOne($query); 
        $_SESSION["cart"][$color.$id]["images"]= $product["productImage"];
        $_SESSION["cart"][$color.$id]["productName"]= $product["productName"];
        $_SESSION["cart"][$color.$id]["productPrice"]= $product["productPrice"];
        $_SESSION["cart"][$color.$id]["quantity"] = 1;
        $_SESSION["cart"][$color.$id]["id"] = $id;
        $_SESSION["cart"][$color.$id]["color"] = $_SESSION["color"];
     }else if(!empty( $_SESSION["cart"][$color.$id])){
      $_SESSION["cart"][$color.$id]["quantity"]++;
     }
     header("location:../detail.php?id=$id");
?>

