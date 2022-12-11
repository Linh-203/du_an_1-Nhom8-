
<?php
include "../model/connect.php";
      session_start();
    //   unset( $_SESSION["cart"]);
      $id = $_SESSION["id"];
      $query = "SELECT products.id AS idPrd, products.productName, COUNT(comment.content) AS 'So_luong' , 
      MAX(comment.date_cmt) AS 'Moi_nhat', MIN(comment.date_cmt) AS 'Cu_nhat' 
      FROM comment JOIN products ON comment.id_product= products.id GROUP BY products.id, products.productName 
      HAVING So_luong>0 ORDER BY So_luong DESC;";
      $comment = getAll($query);
     
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
           <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng cmt</th>
                    <th>Sớm nhất</th>
                    <th>Muộn nhất</th>
                    <th>Chi tiết</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach($comment as $key => $value):?>
                <tr>
                    <td><?php echo $key +1 ?></td>
                    <td><?php echo $value["productName"] ?></td>
                    <td><?php echo $value["So_luong"] ?></td>
                    <td><?php echo $value["Moi_nhat"] ?></td>
                    <td><?php echo $value["Cu_nhat"] ?></td>
                    <td><a href="./detail_comment.php?id=<?php echo $value["idPrd"]?>">Chi tiết</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
           </table>
                <footer>
                    
                </footer>
    
    </div>
   
</body>
</html>