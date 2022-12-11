<?php
      session_start();
    //   unset( $_SESSION["cart"]);
    
    if(!empty($_SESSION["cart"])){
      $cart = $_SESSION["cart"];
      $so_luong = count($cart);
    }
     
      $count_money=0;
      if(!empty($_GET["id"])){
      $alert = $_GET["id"];
      }
      // unset($_SESSION["cart"]);
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
   
    table,td{
        height: 50px;
       
    }
    td img{
        width: 53%;
        height: auto;
    }
    table,td,th{
        padding: 10px;
        font-size: 20px;
        border: none;
        border-bottom: 2px solid lavender;
    }
   a{
    text-decoration: none;
   }
   #mua:hover{
    
    background: linear-gradient(90deg,#97c93d,#4fba69);
    transition: 3s;
   }
   
    
</style>
<body>
    <div class="container">
       
    <header style="background-color: #131921;">
      <div class="left">
        <div class="logo" style="text-align: center;">
          <img height="60px" src="../src/image/tech.png" alt="">
          <h4 style="color: lightblue; font-weight: 600; font-size: 20px;">HIGH-TECH</h4>
        </div>
       
      </div>
      <div class="right">
        <form action="" style="background-color: white;border-radius: 7px">
          <input type="text" placeholder="Tìm kiếm sản phẩm..." style="width: 900px;background-color: white;">
          <button><i style="font-size: 20px;border-radius: 0 7px 7px 0;background-color: rgba(243, 168, 71, 1);height: 40px; padding:10px;text-align: center; " class="fa fa-search"></i></button>
        </form>
        <div class="icon" style="display: flex;align-items: center;color: white;">
          <i class="fas fa-heart"></i>
          <a href="./view/list_bill.php"><i style="margin: 0 20px;" class="fas fa-clipboard-list"></i></a>

          <a id="show_cart" style="display: flex; margin-right: 30px;text-decoration: none;" href="./view/view_cart.php?id="> <i id="count" style="margin-right: 30px;color: lavender;" class="fas fa-shopping-bag"></i>
          
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
            <img height="35px" style="border-radius: 50%;" src="../src/image/<?php echo $_SESSION["avatar"] ?>" alt="">
          <?php } ?>

        </div>
      </div>
    </header>
    <!-- <img width="100%" src="https://cdn.watchstore.vn/uploads/productBanners/5pkXymn.jpg" alt=""> -->
    
    <div class="menu" style="background-color: #232f3e;padding: 10px;margin-left: 0px;display: flex;justify-content: space-between;">
          <ul>
            <li><a href="./index.php"><i class="fa fa-home-lg-alt"></i> Trang chủ</a></li>
            <li><a href="">Sản phẩm</a></li>
            <li><a href="">Tin tức</a></li>
            <li><a href="">Giới thiệu</a></li>

          </ul>
          <font ><marquee direction="left" style="background:orange">Voucher khuyến mãi </marquee></font>
        </div>
    
        <?php 
      if(!empty($_SESSION["cart"])){ ?>
        <!-- <?php var_dump($_SESSION["cart"]) ?> -->
      <h1 style="text-align: center;margin-top: 20px;color: rgba(108, 93, 211, 1);border-bottom: 2px solid rgba(108, 93, 211, 1); display: inline-block;">Giỏ hàng của bạn </h1>
      <p style="color: red; font-size: 20px; text-align: right; font-weight: 600; margin-right: 60px;text-decoration: underline;"><?php if(!empty($alert)) echo $alert?></p>
    <table border="1" style="border-collapse: collapse;width: 90%;margin: auto; margin-top: 30px;">
        <thead>
            <tr style="background-color: rgb(194, 225, 255);">
                <th>Ảnh sản phẩm</th>
                <th>Màu</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
              
             <?php foreach($cart as $id => $product):?>  
             
                <tr>
                   <td style="width: 200px;text-align: center" ><img src="../src/image/<?php echo $product["images"]?>"> 
                  
                  </td>
                  <td> <?php echo $product["color"] ?></td>
                   <td style="width: 450px;"><?php echo $product["productName"]?></td>
                   <td style="text-align: center;"><?php echo $product["productPrice"]?>₫ </td>
                   <td style="text-align: center;" id="update"><a style="background-color: orangered;margin-right: 5px;border-radius: 50%;padding: 0 10px;color: white"; id="delete" href="../controller/update_cart.php?id=<?php echo $product["id"]?>&type=decre&color=<?php echo $product["color"]?>" >-</a> <?php echo $product["quantity"]?>
                   <a style="background-color: green;margin-left: 5px;padding: 0 10px;color: white;border-radius: 50%;" href="../controller/update_cart.php?id=<?php echo $product["id"]?>&type=incre&color=<?php echo $product["color"]?>">+</a>
                   
                </td>
                   <td style="text-align: center;"><?php $result= $product["productPrice"] * $product["quantity"];  echo $result?>.000₫</td>
                   <td style="text-align: center;"> <a onclick="return confirm('Xóa khỏi giỏ hàng')" href="../controller/delete_cart.php?id=<?php echo $id?>"><i style="color: red;" class="fa-regular fa-trash-can"></i></a> </td>               
                </tr>
                <?php $count_money = $count_money + $result ?>
                <?php endforeach?>
                <tr>            
                    <th id="tt" style="color: red;" colspan="6">Tổng tiền: <?php echo $count_money?>₫</th>
                </tr>
             
            
        </tbody>
    </table>  
    <a  href="./check_out.php?id=" style="display: flex; justify-content: right; margin-right: 50px; text-decoration: none;"><button id="mua" style="font-size: 20px; font-weight: bold; background-color: darkcyan;padding: 0 10px;margin-top: 30px;color:white; ;">Mua hàng</button></a>
    <?php }else{ ?>
        <div style="text-align: center;">
              <img height="200px" src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/cart/9bdd8040b334d31946f49e36beaf32db.png" alt="">
                <h1>Giỏ hàng trống</h1>
                <a href="../index.php">Mua ngay</a>
                </div>
            <?php }?>
    
                <footer>
                    
                </footer>
    
    </div>
   
</body>
</html>