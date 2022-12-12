
<?php
include "../model/connect.php";
      session_start();
      ob_start();
     $id = $_GET["id"];
     $query = "SELECT * FROM oder where id=$id";
     $oder = getOne($query);
     $query = "SELECT *, oder_detail.quantity AS quantity_oder FROM oder_detail JOIN products ON oder_detail.id_product=products.id 
     JOIN oder ON oder_detail.id_order = oder.id
     where id_order=$id";
     $product = getAll($query);

      

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
    #img img{
        width: 100%;
    }
    #img{
       
        width: 150px;
    }
    #name{
        width: 650px;
    }
   
    table,td{
        height: 50px;
        
    }
    td img{
        width: 55%;
        height: auto;
    }
    table,td,th{
        padding: 10px;
        font-size: 20px;
        border-bottom: 10px solid #f7faff;
       border-collapse: collapse;

        
    }
    tr{
      
    }
    #price, #total{
        color:red
    }
  
  
    
</style>
<body >
    <div class="container" style="background-color: rgba(245, 245, 245, 1);">
       
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
        <?php if(!empty($_SESSION["id"])){ ?>
         <a href="./view/favorite_product.php"><i class="fas fa-heart"></i></a> 
          <?php }else{ ?>
           <a href="./login"> <i class="fas fa-heart"></i></a>
            <?php } ?>
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
          <a href="./login">  <i class="fas fa-user"></i></a>
          <?php } else { ?>
       <a href="./view/account.php"><img height="40px" id="user_hover" width="40px" style="border-radius: 50%;" src="../src/image/<?php echo $_SESSION["avatar"] ?>" alt=""></a>   
          <?php } ?>

        </div>
      </div>
    </header>
    <!-- <img width="100%" src="https://cdn.watchstore.vn/uploads/productBanners/5pkXymn.jpg" alt=""> -->
    
    <div class="menu" style="background-color: #232f3e;padding: 10px;margin-left: 0px;display: flex;justify-content: space-between;">
          <ul>
            <li><a href="./index.php"><i class="fa fa-home-lg-alt"></i> Trang chủ</a></li>
            <li><a href="./product.php">Sản phẩm</a></li>
            <li><a href="./news.php">Tin tức</a></li>
            <li><a href="./gioi_thieu.php">Giới thiệu</a></li>

          </ul>
          <font ><marquee direction="left" style="background:orange">Voucher khuyến mãi </marquee></font>
        </div>
        <p style="font-weight:500;color: black;margin-top: 20px;font-size: 30px;border-left: 5px solid #ee4d2d;;padding-left: 10px;">Chi tiết hóa đơn</p>
        <hr>
        <main style="display: flex;padding: 40px 20px">
        <div class="info" style="font-size:20px;font-weight: 500;">
       <li>Tên người đặt: <?php echo $oder["orderer"]?></li>  
       <li>Số điện thoại: <?php echo $oder["phone"]?></li>
          <li>Địa chỉ nhận hàng: <?php echo $oder["adress"]?></li>
          <li>Thời gian đặt: <?php echo $oder["date"]?></li>
          <li>Trạng thái: <?php 
         if($oder["status"]==0){ ?>
            Chờ xác nhận 
    <?php    }else if($oder["status"]==1){ ?>
          Chờ lấy hàng

 <?php   }else if($oder["status"]==2){ ?>
          Đang giao
 <?php }else if($oder["status"]==3){?>
         Đã nhận hàng
        <?php }else{?>
            
            Đã hủy
      <?php  }
        
        ?>
          <li> Thanh toán: <?php  
          if($oder["pay"]==1){ ?>
            Chưa thanh toán
     <?php    }else{ ?>
             Đã thanh toán
             <?php  }?>
     </li>
      <li>Dự kiến ngày nhận: <?php echo $oder["received_date"]?></li>

          </div>
          <div class="sp" style="margin-left: 50px;">
         <table style="background-color: white;margin: auto;">
           
            <tbody>
                <?php foreach($product as $key => $value):?>
                <tr>
                 
                    <td id="img" ><img src="../src/image/<?php echo $value["productImage"];?>" alt=""></td>
                    <td id="name"><p> <?php echo $value["productName"];  ?></p>
                   <p> <?php echo $value["color"]; ?> x <?php echo $value["quantity_oder"]; ?></p> 
                    </td>
                    <td id="price"><?php echo $value["price"]?>₫</td>
                  
                   
                </tr>
               
                <?php endforeach?>
                <tr><th id="total" colspan="5">Tổng tiền hàng: <?php echo $value["total_product"]?>₫</th></tr> 
              
            </tbody>
         </table>
        
         <h3 style="color:red">Tổng thanh toán: <?php echo $oder["total"]?>₫</h3>
        
         <?php $id_oder = $oder["id"] ;
         ?>
          <form action="../controller/update_huy.php?id=<?php echo $id_oder ?>" method="post">
            <?php if($oder["status"]==0 || $oder["status"]==1){ ?>
                <button name="huy" style="background-color: #ee4d2d;padding: 0 15px;font-size: 20px; border-radius: 5px;color: white;margin-top: 20px;">Hủy</button>
                <?php }else if($oder["status"]==4){ ?>
                     <button name="b_huy" style="background-color: green;font-size: 20px;padding: 0 15px; border-radius: 5px;color: white;margin-top: 20px;">Bỏ Hủy</button>
             <?php   }else{ ?>
                <button name="huy" disabled style="opacity: 0.4;;background-color: #ee4d2d;padding: 0 15px;font-size: 20px; border-radius: 5px;color: white;margin-top: 20px;">Hủy</button>

              <?php }  ?>
          </form>


         </div>
         </main>
        
                <footer>
            
                </footer>
    
    </div>
   
</body>
</html>