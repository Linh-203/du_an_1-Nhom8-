
<?php
include "../model/connect.php";
      session_start();
    //   unset( $_SESSION["cart"]);
      $count_money=0;
      $id = $_SESSION["id"];
      $query = "SELECT * FROM oder";
      $oder = getAll($query);
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
        text-align: center;
    }
    td img{
        width: 55%;
        height: auto;
    }
    table,td,th{
        padding: 10px;
        font-size: 20px;
       border: 1px solid black;
       border-collapse: collapse;
        
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
                    <li><a href=""><i class="fa fa-home-lg-alt"></i> Trang chủ</a></li>
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
            <i style="margin-right: 30px;" class="fa fa-clipboard"></i>
          <a href="./view_cart.php?id="> <i style="margin-right: 30px;" class="fas fa-shopping-bag"></i></a> 
          <?php if(empty($_SESSION["id"])){?> 
          <i class="fas fa-user"></i>
          <?php } else{?>
                    <img height="30px" src="<?php echo $_SESSION["avatar"]?>" alt="">
            <?php } ?>
            
            </div>
            </div>
        </header>
        <?php ?>
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã hóa đơn</th>
                    <th>Trạng thái thanh toán</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái đơn hàng</th>
                    <th></th>
                   
                </tr>
            </thead>
            <tbody>
             <?php foreach($oder as $key => $value):?>
                <tr>
                    <td><?php echo $key +1 ?></td>
                    <td><?php echo $value["id"]?></td>
                    <td><?php
                    if($value["pay"]==1){ ?>
                       Chưa thanh toán
                <?php    }else{ ?>
                        Đã thanh toán
                        <?php  }?>
                    
                     </td>
                     <td><?php echo $value["total"]?></td>
                    <td><?php 
                    if($value["status"]==0){ ?>
                        Chờ xác nhận 
                <?php    }else if($value["status"]==1){ ?>
                       Chờ lấy hàng

             <?php   }else if($value["status"]==2){ ?>
                      Đang giao 
             <?php }else if($value["status"]==3){?>
                     Đã nhận hàng
                    <?php }else{?>
                        
                        Đã hủy
                  <?php  }
                    
                    ?></td>
                    <td><a href="./oder_detail.php?id=<?php echo $value["id"]?>"><i style="color: orange;" class="fas fa-edit"></i></a>
                    <a href="../controller/delete_oder.php?id=<?php echo $value["id"]?>"><i style="color: red;" class="fas fa-minus-circle"></i></a>
                </td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
       
        
                <footer>
                    
                </footer>
    
    </div>
   
</body>
</html>