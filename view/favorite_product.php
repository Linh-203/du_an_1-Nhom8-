
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
       <main>
        <h2 style="font-weight: 500;">Sản phẩm yêu thích của bạn</h2>

       </main> 
       <div class="product">
        <?php foreach($favorite_product as $value):?>
            <div class="colum">
             <a href="../detail.php?id=<?php echo $value["id"]?>"><div class="image_prd">
                <img src="../src/image/<?php echo $value["productImage"]?>" alt="">
                </div>
                <h3 style="height: 45px; overflow: hidden;display: -webkit-box; -webkit-box-orient: vertical;
          -webkit-line-clamp: 2;color: black;font-weight: 500;"><?php echo $value["productName"]?></h3>
                <h4 style="color: red;"><?php echo $value["productPrice"]?>.000₫</h4>
                </a>   
                <div class="love" style="display: flex; justify-content: space-between;">
                    <div style="display: flex;">
                <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
                <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
                <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
                <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
                <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i> </div>
                <?php 
                if(!empty($_SESSION["id"])){
                $id = $_SESSION["id"];
                  $id_prd= $value["id"];
                    $sql = "SELECT * from favorite_product where id_product = $id_prd and id_user like n'$id' ";
                    $favorite = getAll($sql);
                
                    if(count($favorite) != 0){?>
                      <a onclick="return confirm('Xóa khỏi sản phẩm yêu thích')" href="../controller/delete_favorite.php?id=<?php echo $value["id"] ?>"><i style="font-size: 20px; color: red;margin-right: 15px;" class="fa fa-heart"></i></a> 

                      <?php } else{?>
               <a href="../controller/add_favorive.php?id=<?php echo $value["id"] ?>"><i style="font-size: 20px; color: red;margin-right: 15px;" class="far fa-heart"></i></a> 
                <?php } 
                }?>
                </div>
                
            </div>
            <?php endforeach?>
        </div>
        
                <footer>
                    
                </footer>
    
    </div>
   
</body>
</html>