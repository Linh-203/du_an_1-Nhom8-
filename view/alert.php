
<?php
include "../model/connect.php";
      session_start();
    //   unset( $_SESSION["cart"]);
    if(!empty($_SESSION["cart"])){
        $cart = $_SESSION["cart"];
        $so_luong = count($_SESSION["cart"]);
      }
      if(!empty($_SESSION["id"])){
      $id = $_SESSION["id"];
      }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../src/css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&family=Quicksand&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/969bec5078.js" crossorigin="anonymous"></script>
</head>
<style>
   a{
    text-decoration: none;
   }
   #detail{
    transition: 1s;
    border: 1px solid lightgray; margin-right: 10px;border-radius: 5px;padding: 5px 10px;font-size: 20px;color: gray;
   }
   #detail:hover{
    background-color: #ee4d2d;
    color: white;
   }
  #continue{
    border: 1px solid #ee4d2d;
    padding: 5px 10px; background-color: rgba(240, 98, 33, 1);font-size: 20px;border-radius: 5px; color: white;
  }
  #continue:hover{
    background-color: white;
    border: 1px solid #ee4d2d;
    color: #ee4d2d;
  }
  
    
</style>
<body>
    <div class="container">
       
    <?php include "./public/header.php" ?>
         
        
                  
                    <div class="alert" style="text-align: center;">
                    <img height="130px" src="https://cachbothuocla.vn/wp-content/uploads/2019/03/tick-xanh.png" alt="">
                    <h1 style="color: orange;">Đặt hàng thành công !</h1>
                    <p style="font-size: 20px; margin-top:15px; margin-bottom: 40px;">Chúng tôi sẽ liên hệ quý khách để xác nhận đơn hàng trong <br> thời gian sớm nhất !</p>
                    
                   <a href="../view/list-bill.php"> <button id="detail">Xem chi tiết đơn hàng</button></a>
                   <a href="../product.php"><button id="continue" >Tiếp tục mua hàng</button></a> 
                    </div>
    
    </div>
   
</body>
</html>