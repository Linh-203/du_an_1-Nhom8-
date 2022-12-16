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
 <?php include "./public/head.php" ?>
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
        text-align: center;
    }
   a{
    text-decoration: none;
   }
   #mua:hover{
    
    background: linear-gradient(90deg,#97c93d,#4fba69);
    transition: 3s;
   }
   .typpy_colum{
    display: flex;
    align-items: center;
   

  }
  .show_type{
    margin-left: 20px;
  }
  .show_cart{
    width: 200px;
    
  }
  .iteam_cart{
    width: 100%;
    height: 150px;
   
   
  }
  .iteam_cart:hover{
    opacity: 0.5;
    

  }
  .show_cart a{
    color:white;

  }
  .show_cart .view_cart_detail{
    display: inline-block;
    padding: 10px 5px;
    border: 1px solid white;
    display: flex;
    justify-content: center;
    

    
  }
  .show_cart .view_cart_detail:hover{
  background-color: #97c93d;
 
  }
  .iteam_cart p{
    text-overflow: ellipsis;
    width: 100%;
    height: 20px;
    overflow: hidden;
    display: -webkit-box; 
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 1;
    font-size: 14px;

  }
  .iteam_cart img{
    width: 50%;
  }
  .tippy-content{
    background-color: #ee4d2d;
  }
  #ql_tk, #logout{
    color: white;
    font-weight: 500;
    text-transform: uppercase;
  }
  .alert{
        animation-name:dich_chuyen;
        animation-iteration-count:infinite;
        animation-duration: 900ms ;
        width: 340px;
  }
  @keyframes dich_chuyen {
        0%   {right:0px;}
        100%  {right:100px;} 
    }
  
</style>
<body>
    <div class="container">
   <?php include "./public/header.php" ?>
    
        <?php 
      if(!empty($_SESSION["cart"])){ ?>
      <h1 style="text-align: center;margin-top: 20px;color: rgba(108, 93, 211, 1);border-bottom: 2px solid rgba(108, 93, 211, 1); display: inline-block;">Giỏ hàng của bạn </h1>
      <?php if(!empty($alert)){?>
            <div class="alert" style="background-color: rgba(242, 222, 222, 1);border: 1px solid #ee4d2d;color: red;position: absolute;top: 0;right: 0;">
				<span style="font-weight: 500; font-size: 18px;"><img style="margin-right: 8px;" height="40px" src="../src/image/err.png" alt=""> <?php echo $alert ?></span>
				<button  class="close">&times;</button>
				</div>
  <?php } ?>
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
                   <td style="text-align: center;"><?php $result= $product["productPrice"] * $product["quantity"];  echo $result?>₫</td>
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
                <a href="../product.php" style="background-color: #ee4d2d; padding: 10px 15px; color:white" >Mua ngay</a>
                </div>
            <?php }?>
    
                <?php include "./public/footer.php" ?>
    
    </div>
   
</body>
<script>
   tippy('#show_cart', {
        arrow:false,
        content: `<?php if(!empty($cart)){ ?>
              <div class="show_cart"> 
             <?php foreach($cart as $id => $product):?> 


              <div class="iteam_cart"> 
              <a  href="../detail.php?id=<?php echo $product["id"] ?>">
             <p><?php echo $product["productName"] ?></p>
             <div class="typpy_colum">
             <img src="../src/image/<?php echo $product["images"] ?>" alt="">
             <div class="show_type">
            <p><?php echo $product["color"] ?> X <?php echo $product["quantity"] ?></p>
            <p><?php echo $product["productPrice"] ?>₫</p>
             </div>
             </div>
             </div>
             </a>
             
             <?php endforeach ?>
             <a class="view_cart_detail" href="../view/view_cart.php?id=">Xem chi tiết</a>
             </div> 
             <?php } ?>
         `,
        allowHTML: true, 
        placement: 'bottom',
        delay: [0, 1000],
        duration: [0, 1000],
        interactive: true,
      });
</script>
<script>
  tippy('#user_hover', {
        content: '<a id="logout" href="../controller/log_out.php">Đăng xuất</a> <br> <a id="ql_tk" href="../view/account.php">Quản lý tài khoản</a> ',
        allowHTML: true, 
        placement: 'bottom-start',
        delay: [0, 1000],
        duration: [0, 1000],
        interactive: true,
        //  theme: 'light',
        
     
       
      });
    
    
      $(document).ready(function(){
  $(".close").click(function(){
    $(".alert").alert("close");
  });
});
</script>
</html>