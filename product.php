<?php
   include "./model/connect.php";
   session_start();
   $query =  "SELECT * FROM category";
   $category = getAll($query);
   $query = "SELECT * FROM products where categoryId = 3";
   $product3 = getAll($query);
   $query = "SELECT * FROM products where categoryId =1";
   $product1 = getAll($query);
   $query = "SELECT * FROM products where categoryId =4";
   $product4 = getAll($query);
   $query = "SELECT * FROM products where categoryId =5";
   $product5 = getAll($query);
   $query = "SELECT * FROM products where categoryId =8";
   $product8 = getAll($query);
   if(!empty($_SESSION["id"])){
    $id_person = $_SESSION["id"];
   }
   if (!empty($_SESSION["cart"])) {
    $so_luong = count($_SESSION["cart"]);
  }
   if(isset($_POST["loc"])){
  if (!empty($_POST["price"])) {
    $price = $_POST["price"];
    $query = "SELECT * FROM products where categoryId=1 and productPrice <= $price ";
    $product1 = getAll($query);
    $query = "SELECT * FROM products where categoryId=3 and productPrice <= $price ";
    $product3 = getAll($query);
    $query = "SELECT * FROM products where categoryId=4 and productPrice <= $price ";
    $product4 = getAll($query);
    $query = "SELECT * FROM products where categoryId=5 and productPrice <= $price ";
    $product5 = getAll($query);
    $query = "SELECT * FROM products where categoryId=8 and productPrice <= $price ";
    $product8 = getAll($query);
}
   }
    
   if(isset($_POST["submit_search"])){
    if (empty($_POST["search"])) {
        $query = "SELECT * FROM products where categoryId = 3";
        $product3 = getAll($query);
        $query = "SELECT * FROM products where categoryId =1";
        $product1 = getAll($query);
        $query = "SELECT * FROM products where categoryId =4";
        $product4 = getAll($query);
        $query = "SELECT * FROM products where categoryId =5";
        $product5 = getAll($query);
        $query = "SELECT * FROM products where categoryId =8";
        $product8 = getAll($query);
    } else {
        $search = $_POST["search"];
        $query = "SELECT * FROM products where categoryId =8 and productName like '%$search%'";
        $product8 = getAll($query);
        $query = "SELECT * FROM products where categoryId =5 and productName like '%$search%'";
        $product5 = getAll($query);
        $query = "SELECT * FROM products where categoryId =4 and productName like '%$search%'";
        $product4 = getAll($query);
        $query = "SELECT * FROM products where categoryId =3 and productName like '%$search%'";
        $product3 = getAll($query);
        $query = "SELECT * FROM products where categoryId =1 and productName like '%$search%'";
        $product1 = getAll($query);
       
        
    }
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./src/css/index.css">
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
          <img height="60px" src="./src/image/tech.png" alt="">
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
        <form action="./product.php" method="POST">
          <input name="search" type="text" placeholder="Tìm kiếm sản phẩm...">
          <button name="submit_search"><i style="font-size: 20px; " class="fa fa-search"></i></button>
        </form>
        <div class="icon" style="display: flex;align-items: center;color: white;">
       <a href="./view/favorite_product.php">   <i class="fas fa-heart"></i></a>
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
           <a href="./view/login.php"> <i class="fas fa-user"></i></a>
          <?php } else { ?>
            <img height="35px" style="border-radius: 50%;" src="<?php echo $_SESSION["avatar"] ?>" alt="">
          <?php } ?>

        </div>
      </div>
    </header>
       
        <div class="banner" style="margin-top: 10px; ">
        <div class="" style="width: 100%;">
         <!-- <img src="https://cdn.pnjwatch.com.vn/Category/45/Banner-DocQuyen-23040x880-3.jpg" alt=""> -->
            <img style=" " src="https://donghochat8668.com/wp-content/uploads/2020/09/Dong-ho-chat-3-02-1400x438.jpg" alt="">
            </div>
          
        </div>
       <h1 class="cate" ><i class="fa fa-bars"></i> Danh mục sản phẩm</h1>
        <div class="category">
            <?php foreach($category as $value):?>
            <div class="colum">
                <div class="img" >
                <img height="" src=" <?php echo $value["image"]?>" alt="">

                </div>
                <p><?php echo $value["categoryName"]?></p>
            </div>
            <?php endforeach?>
            
        </div>
        <div class="oder">
            <div class="local">
            <img height="70px" src="https://static.swappa.com/static/images/banners/local_skyline_purple.png" alt="">
            <h4 style="margin-left: 50px;">Giao hàng vào ngày hôm sau trong 48 đô thị</h4>
            </div>
            <button style="border: 2px solid white;padding: 0 15px; font-size: 20px;color: white;">Chi tiết từng địa phương</button>
        </div>
        <h2>Lọc giá sản phẩm</h2>
        <form id="form" action="./product.php" method="POST" onchange="change()">
            <input style="width: 300px;" id="locgia" type="range" name="price" id="" min="0" max="1000000">
            <span id="price"></span>
            <button name="loc" id="loc" type="submit" style="font-size: 20px; background-color:lavender ;">Lọc</button>
        </form>
        <h1 style=" background: transparent linear-gradient(90deg,#009981 0%,#00483d 100%) 0% 0% no-repeat;
    color: white; display: inline-block; margin: 20px 0;padding:10px; border-radius: 5px;">Apple</h1>
        
        <div class="product">
        <?php foreach($product1 as $value):?>
            <div class="colum">
             <a href="./detail.php?id=<?php echo $value["id"]?>"><div class="image_prd">
                <img src="./src/image/<?php echo $value["productImage"]?>" alt="">
                </div>
                <h3 style="height: 45px; overflow: hidden;display: -webkit-box; -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;color: black;font-weight: 500;"><?php echo $value["productName"]?></h3>
                <h4 style="color: red;"><?php echo $value["productPrice"]?>₫</h4>
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
                      <a onclick="return confirm('Xóa khỏi sản phẩm yêu thích')" href="./controller/delete_favorite.php?id=<?php echo $value["id"] ?>"><i style="font-size: 20px; color: red;margin-right: 15px;" class="fa fa-heart"></i></a> 

                      <?php } else{?>
               <a href="./controller/add_favorive.php?id=<?php echo $value["id"] ?>"><i style="font-size: 20px; color: red;margin-right: 15px;" class="far fa-heart"></i></a> 
                <?php } 
                }?>
                </div>
                
            </div>
            <?php endforeach?>
        </div>
         
        
        <h1 style=" background: transparent linear-gradient(90deg,#009981 0%,#00483d 100%) 0% 0% no-repeat;
    color: white; display: inline-block; margin: 20px 0;padding:10px; border-radius: 5px;">LIGE</h1>
        <div class="product">
        <?php foreach($product3 as $value):?>
            <div class="colum">
             <a href="./detail.php?id=<?php echo $value["id"]?>"><div class="image_prd">
                <img src="./src/image/<?php echo $value["productImage"]?>" alt="">
                </div>
                <h3 style="height: 45px; overflow: hidden;display: -webkit-box; -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;color: black;font-weight: 500;"><?php echo $value["productName"]?></h3>
                <h4 style="color: red;"><?php echo $value["productPrice"]?>₫</h4>
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
                      <a onclick="return confirm('Xóa khỏi sản phẩm yêu thích')" href="./controller/delete_favorite.php?id=<?php echo $value["id"] ?>"><i style="font-size: 20px; color: red;margin-right: 15px;" class="fa fa-heart"></i></a> 

                      <?php } else{?>
               <a href="./controller/add_favorive.php?id=<?php echo $value["id"] ?>"><i style="font-size: 20px; color: red;margin-right: 15px;" class="far fa-heart"></i></a> 
                <?php } 
                }?>
                </div>
                
            </div>
            <?php endforeach?>
        </div>
        <h1 style=" background: transparent linear-gradient(90deg,#009981 0%,#00483d 100%) 0% 0% no-repeat;
    color: white; display: inline-block; margin: 20px 0;padding:10px; border-radius: 5px;">XIAOMI </h1>
        <div class="product">
        <?php foreach($product5 as $value):?>
            <div class="colum">
             <a href="./detail.php?id=<?php echo $value["id"]?>"><div class="image_prd">
                <img src="./src/image/<?php echo $value["productImage"]?>" alt="">
                </div>
                <h3 style="height: 45px; overflow: hidden;display: -webkit-box; -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;color: black;font-weight: 500;"><?php echo $value["productName"]?></h3>
                <h4 style="color: red;"><?php echo $value["productPrice"]?>₫</h4>
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
                      <a onclick="return confirm('Xóa khỏi sản phẩm yêu thích')" href="./controller/delete_favorite.php?id=<?php echo $value["id"] ?>"><i style="font-size: 20px; color: red;margin-right: 15px;" class="fa fa-heart"></i></a> 

                      <?php } else{?>
               <a href="./controller/add_favorive.php?id=<?php echo $value["id"] ?>"><i style="font-size: 20px; color: red;margin-right: 15px;" class="far fa-heart"></i></a> 
                <?php } 
                }?>
                </div>
                
            </div>
            <?php endforeach?>
        </div>
        <h1 style=" background: transparent linear-gradient(90deg,#009981 0%,#00483d 100%) 0% 0% no-repeat;
    color: white; display: inline-block; margin: 20px 0;padding:10px; border-radius: 5px;">AMA </h1>
        <div class="product">
        <?php foreach($product8 as $value):?>
            <div class="colum">
             <a href="./detail.php?id=<?php echo $value["id"]?>"><div class="image_prd">
                <img src="./src/image/<?php echo $value["productImage"]?>" alt="">
                </div>
                <h3 style="height: 45px; overflow: hidden;display: -webkit-box; -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;color: black;font-weight: 500;"><?php echo $value["productName"]?></h3>
                <h4 style="color: red;"><?php echo $value["productPrice"]?>₫</h4>
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
                      <a onclick="return confirm('Xóa khỏi sản phẩm yêu thích')" href="./controller/delete_favorite.php?id=<?php echo $value["id"] ?>"><i style="font-size: 20px; color: red;margin-right: 15px;" class="fa fa-heart"></i></a> 

                      <?php } else{?>
               <a href="./controller/add_favorive.php?id=<?php echo $value["id"] ?>"><i style="font-size: 20px; color: red;margin-right: 15px;" class="far fa-heart"></i></a> 
                <?php } 
                }?>
                </div>
                
            </div>
            <?php endforeach?>
        </div>
        <h1 style=" background: transparent linear-gradient(90deg,#009981 0%,#00483d 100%) 0% 0% no-repeat;
    color: white; display: inline-block; margin: 20px 0;padding:10px; border-radius: 5px;">NOSIBA </h1>
        <div class="product">
        <?php foreach($product4 as $value):?>
            <div class="colum">
             <a href="./detail.php?id=<?php echo $value["id"]?>"><div class="image_prd">
                <img src="./src/image/<?php echo $value["productImage"]?>" alt="">
                </div>
                <h3 style="height: 45px; overflow: hidden;display: -webkit-box; -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;color: black;font-weight: 500;"><?php echo $value["productName"]?></h3>
                <h4 style="color: red;"><?php echo $value["productPrice"]?>₫</h4>
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
                      <a onclick="return confirm('Xóa khỏi sản phẩm yêu thích')" href="./controller/delete_favorite.php?id=<?php echo $value["id"] ?>"><i style="font-size: 20px; color: red;margin-right: 15px;" class="fa fa-heart"></i></a> 

                      <?php } else{?>
               <a href="./controller/add_favorive.php?id=<?php echo $value["id"] ?>"><i style="font-size: 20px; color: red;margin-right: 15px;" class="far fa-heart"></i></a> 
                <?php } 
                }?>
                </div>
                
            </div>
            <?php endforeach?>
        </div>

        <h1 style=" background: transparent linear-gradient(90deg,#009981 0%,#00483d 100%) 0% 0% no-repeat;
    color: white; display: inline-block; margin: 20px 0;padding:10px; border-radius: 5px;">Ưu đãi thanh toán</h1>
    <div class="uda" style="display: grid; grid-template-columns: repeat(3,1fr); padding: 0 30px;">
        <div class="img_ud" >
            <img src="https://cdn.tgdd.vn/2022/06/banner/EXB-500k-380x200-2.png" alt="">
        </div>
        <div class="img_ud">
            <img src="https://cdn.tgdd.vn/2022/08/banner/Moca-380x200-1.png" alt="">
        </div>
        <div class="img_ud">
            <img src="https://cdn.tgdd.vn/2022/09/banner/VCBDesk--1--380x200-1.png" alt="">
        </div>
    </div>
    <div class="chitiet" style=" display:grid; grid-template-columns: repeat(4,1fr);">
                    <div class="free200">
                        <i class="fa fa-map-marked-alt"></i>
                        <h1>Miễn phí giao hàng</h1>
                        <p>Đơn hàng trên 200k</p>
                    </div>
                    <div class="chamsoc">
                        <i class="fa fa-phone-volume"></i>
                        <h1>Chăm sóc khách hàng</h1>
                        <p>Liên tục 24/7/365</p>
                    </div>
                    <div class="khuyenmai">
                        <i class="fa fa-recycle"></i>
                        <h1>Đổi trả hàng</h1>
                        <p>Đổi trả hàng trong 7 ngày</p>
                    </div>
                    <div class="khuyenmai">
                        <i class="fa fa-recycle"></i>
                        <h1>Khuyến mãi cuối năm</h1>
                        <p>Giảm 20% khi mua từ 3 sản phẩm </p>
                    </div>
                </div>
                <footer>
                    
                </footer>
    
    </div>
   
</body>
<script>
     var price = document.querySelector("#price");
    var input = document.querySelector("#locgia"); 
    function change(){
    price.innerText=input.value
    
}
</script>
</html>