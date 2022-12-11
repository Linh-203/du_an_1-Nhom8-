
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
      $query = "SELECT * FROM favorite_product join products on favorite_product.id_product = products.id where id_user like n'$id'";
     $favorite_product = getAll($query);

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
  
  
    
</style>
<body>
    <div class="container">
       
    <header>
      <div class="left">
        <div class="logo" style="text-align: center;">
          <img height="60px" src="../src/image/tech.png" alt="">
          <h4 style="color: lightblue; font-weight: 600; font-size: 20px;">HIGHT-TEACH</h4>
        </div>
        <div class="menu">
          <ul>
            <li><a href="./index.php"><i class="fa fa-home-lg-alt"></i> Trang chủ</a></li>
            <li><a href="">Sản phẩm</a></li>
            <li><a href="">Tin tức</a></li>
            <li><a href="">Giới thiệu</a></li>

          </ul>
        </div>
      </div>
      <div class="right">
        <form action="">
          <input type="text" placeholder="Tìm kiếm sản phẩm...">
          <button><i style="font-size: 20px; " class="fa fa-search"></i></button>
        </form>
        <div class="icon" style="display: flex;align-items: center;color: white;">
       <a href=""> <i class="fas fa-heart"></i></a>  
          <a href="./view/list_bill.php"><i style="margin: 0 20px;" class="fas fa-clipboard-list"></i></a>

          <a style="display: flex; margin-right: 30px;text-decoration: none;" href="./view/view_cart.php?id="> <i id="count" style="margin-right: 30px;color: lavender;" class="fas fa-shopping-bag"></i>
            <p style="font-size: 14px;background-color: white;border-radius: 100%; height: 20px; width: 20px;text-align: center; margin-left: -40px;color:red; font-weight: 600;">
              <?php if (!empty($_SESSION["cart"])) {
                echo $so_luong;
              } else {
                echo "0";
              } ?>
            </p>

          </a>

          <?php if (empty($_SESSION["id"])) { ?>
            <i class="fas fa-user"></i>
          <?php } else { ?>
            <img height="35px" style="border-radius: 50%;" src="<?php echo $_SESSION["avatar"] ?>" alt="">
          <?php } ?>

        </div>
      </div>
    </header>
         
        
                  
                    <div class="alert" style="text-align: center;">
                    <img height="130px" src="https://cachbothuocla.vn/wp-content/uploads/2019/03/tick-xanh.png" alt="">
                    <h1 style="color: orange;">Đặt hàng thành công !</h1>
                    <p style="font-size: 20px; margin-top:15px; margin-bottom: 40px;">Chúng tôi sẽ liên hệ quý khách để xác nhận đơn hàng trong <br> thời gian sớm nhất !</p>
                    
                   <a href="../view/list_bill.php"> <button style="border: 1px solid lightgray; margin-right: 10px;border-radius: 5px;padding: 5px 10px;font-size: 20px;color: gray;">Xem chi tiết đơn hàng</button></a>
                   <a href="../index.php"><button style="padding: 5px 10px; background-color: rgba(240, 98, 33, 1);font-size: 20px;border-radius: 5px; color: white;">Tiếp tục mua hàng</button></a> 
                    </div>
    
    </div>
   
</body>
</html>