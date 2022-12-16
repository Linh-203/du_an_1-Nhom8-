
<?php
include "./model/connect.php";
session_start();
$err = "";
$id = $_GET["id"];
// $color = $_SESSION["color"];
 if(!empty($_SESSION["cart"])){
  $cart = $_SESSION["cart"];
 }
if (!empty($_SESSION["id"])) {
  $id_person = $_SESSION["id"];
}
if(isset($_POST["add_cart"])){
  if(empty($_POST["color"])){
    $err = "Phải chọn màu";
  }else{
      //  if(!empty($_POST["đỏ"])){

      //  }
      $_SESSION["color"] = $_POST["color"];
      
    header("location:./controller/add_cart.php?id=$id");
  }
}

$query = "SELECT count(content) AS so_luong FROM comment where id_product = $id";
$so_comment = getAll($query);
if(!empty($_SESSION["cart"])){
  $cart = $_SESSION["cart"];
  $so_luong = count($cart);
}
$query = "SELECT * FROM products where id = $id";
$detail = getOne($query);
$id_cate = $detail["categoryId"];
$query = "SELECT * from products where categoryId = $id_cate ";
$product = getAll($query);
$query = "SELECT * from products join category ON products.categoryId = category.id where categoryId = $id_cate";
$category = getOne($query);

$query = "SELECT *,comment.id as id_cmt FROM comment JOIN users ON comment.id_user = users.id where id_product = $id";
$show_cmt = getAll($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="./src/css/index.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Quicksand&family=Roboto:wght@100&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/969bec5078.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
   <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
</head>
<style>
  #delete{
    border: 1px solid #c0392b;
    background-color: #c0392b;
    color: white;
    padding: 5px 10px;
    border-radius: 3px;
    transition: 1s;
  }
  #delete:hover{
    background-color: white;
    border: 1px solid #c0392b;
    color: #c0392b;
  }
  .typpy_colum{
    display: flex;
    align-items: center;
   

  }
  #logout:hover, #ql_tk:hover{
    opacity: 0.5;
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
  .menucon a {
    text-decoration: none;
    font-size: 18px;
    color: blue;
   
  }

  .thong_so .fas {
    color: #fdd836;
    stroke: #fdd836;
  }

  .img_con img {
    width: 15%;
  }

  .img_con img:hover {
    border: 1px solid red;
  }

  a {
    text-decoration: none;
    text-transform: uppercase;
  }
</style>

<body>
  <div class="container">

   <?php include "./template/header.php" ?>
    
    <div class="menucon" style="padding: 10px;font-weight: 500;">
      <a href="">Hight-Tech</a> ><a href=""> <?php echo $category["categoryName"] ?> </a>
      <?php echo $detail["productName"] ?>
    </div>
    <main style="display: flex; margin-top: 20px; padding-bottom:30px ;">
      <div class="image_detail" style="width: 40%;margin-left: 50px; ">
 
      <?php $no ="";
      if($detail["quantity"]==0){
            $no = "Đã hết hàng"; 
            
            ?>
            
            <div class="" >
            <img style="width: 80%;opacity: 0.3;" src="./src/image/<?php echo $detail["productImage"] ?>" alt="" id="img_main">
            <h1 style=" background-color: #c0392b; color: white;font-weight: 500;padding: 10px;transform: translateY(-480%); width: 80%; text-align: center;"><?php echo $no ?></h1>
            </div>
            <?php    }else{ ?>
        <img style="width: 80%;" src="./src/image/<?php echo $detail["productImage"] ?>" alt="" id="img_main">
        <?php } ?>
        
        <div class="img_con" style="margin-top: 10px;">
          <img src="./src/image/<?php echo $detail["productImage"] ?>" alt="" onclick="change_img('one')" id="one">
          <img src="./src/image/<?php echo $detail["img_1"] ?>" alt="" onclick="change_img('two')" id="two">
          <img src="./src/image/<?php echo $detail["img_2"] ?>" alt="" onclick="change_img('three')" id="three">
          <img src="./src/image/<?php echo $detail["img_3"] ?>" alt="" onclick="change_img('four')" id="four">
          
        </div>
        <div class="item" style="display: flex; margin-top: 20px;justify-content: space-between;padding: 0 50px;">
          <p style="font-size: 20px;">Chia sẻ: <i style="color:rgba(59, 89, 153, 1);font-size: 24px;" class="fab fa-facebook-square"></i><i style="margin: 0 5px; color:rgba(3, 132, 255, 1);font-size: 24px;" class="fab fa-facebook-messenger"></i><i style="color:rgba(216, 43, 103, 1);font-size: 24px;" class="fab fa-instagram"></i>
            <i style="color:rgba(16, 194, 255, 1);font-size: 24px;" class="fab fa-twitter"></i>
          </p>
          <p style="margin-right: 50px;display: flex;align-items: center;"><i style="color:rgba(255, 66, 79, 1);font-size: 24px;margin-right: 5px;" class="far fa-heart"></i> Đã thích (90,8k)</p>
        </div>
      </div>
      <div class="thong_so" style="width: 50%;">
        <p style="color: black;font-weight: 500; font-size: 30px;"> <?php echo $detail["productName"] ?></p>
        4,9 <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
        <h2 style="color: red;"> <?php echo $detail["productPrice"] ?>₫</h2>
        <h2 style="font-size: 20px; font-weight: 500;">Thương hiệu: <?php echo $category["categoryName"] ?></h2>
        <h2 style="font-size: 20px;font-weight: 600;">Thông số kỹ thuật: </h2>
        <p style="font-size: 20px; ;"><?php echo $detail["parameter"] ?></p>
        <p style="font-size: 20px;">Số lượng còn lại: <?php echo $detail["quantity"] ?></p>
        <form action="" method="post" style="padding-top: 20px;font-size: 20px;">
        <div class="input" style="display: flex;">
        <?php if(!empty($detail["color_white"])){?>
         <div class="" style="display: flex; align-items: center;"> <input style="height: 25px;width: 25px;" type="radio" name="color" value="Trắng" onclick="change_img('one')" id="one"><?php echo $detail["color_white"] ?></div>
         <?php } ?>
         <?php if(!empty($detail["color_black"])){?>
         <div class="" style="display: flex; align-items: center;margin: 0 5px;"><input style="height: 25px;width: 25px;"  type="radio" name="color" value="Đen" onclick="change_img('two')" id="two"><?php echo $detail["color_black"] ?></div> 
         <?php }?>
         <?php if(!empty($detail["color_red"])){?>
         <div class="" style="display: flex; align-items: center;"> <input style="height: 25px;width: 25px;" type="radio" name="color" value="Đỏ" onclick="change_img('three')" id="three"><?php echo $detail["color_red"] ?></div>
          <?php } ?>
         <?php if(!empty($detail["color_green"])){?>
         <div class="" style="display: flex; align-items: center;margin-left: 5px;"><input style="height: 25px;width: 25px;"  type="radio" name="color" value="Xanh" onclick="change_img('four')" id="four"><?php echo $detail["color_green"] ?></div> 
         <?php } ?>
        </div>
          <span style="color:red; font-size: 20px;"><?php echo $err ?></span>
        <br>
        <?php if($detail["quantity"]==0){
            ?>
            <button disabled style="transition: 3s;opacity: 0.5;color: white ;font-size: 20px;cursor: pointer;padding: 10px 20px; background-color: #ee4d2d;" name="add_cart" type="submit" > <i style="color:white" class="fa fa-cart-plus"></i> Thêm giỏ hàng</button>
            
        <?php } else{  ?>
        <?php if(!empty($_SESSION["id"])){ ?>
         <button id="cart" style="transition: 3s;color: white ;font-size: 20px;cursor: pointer;padding: 10px 20px; background-color: #ee4d2d;" name="add_cart" type="submit" > <i style="color:white" class="fa fa-cart-plus"></i> Thêm giỏ hàng</button>
        
        </form>
         <?php }else{ ?>
          <a  style="transition: 3s;color: white ;font-size: 20px;cursor: pointer;padding: 10px 20px; background-color: #ee4d2d;" href="../du_an_1-nhom8-/login"><i style="color:white" class="fa fa-cart-plus" ></i>Thêm giỏ hàng</a> <?php } ?>
          <?php } ?>
        <p style="font-size: 16px;text-align: right;color: red;">Đổi trả và Bảo hành 100% Chính hãng <br>
          15 ngày trả hàng <br></p>
          
      </div>
      
    </main>
    <div class="detail" style="display: flex;justify-content: center; border-bottom: 1px solid lightgray; padding-bottom: 20px;">
      <div style="display: flex;align-items: center;">
        <i style="font-size: 25px;color:rgba(43, 193, 184, 1);margin-right:10px ;" class="fas fa-directions"></i>
        <p> Bảo hành có cam kết trong 12 tháng</p>
      </div>
      <div style="display: flex; align-items: center; margin: 0 30px; ">
        <i style="font-size: 25px;color:green;margin-right:10px ;" class="fa fa-shield"></i>
        <p>Bảo hành chính hãng 1 năm tại <br> các trung tâm bảo hành hãng</p>
      </div>
      <div style="display: flex;align-items: center;">

        <i style="font-size: 25px;color:rgba(43, 193, 184, 1);margin-right:10px ;" class="fa fa-shipping-fast"></i>
        <p>Giao hàng tận nhà nhanh chóng </p>
      </div>
    </div>
    <h2 style="margin-top: 20px;">Mô tả sản phẩm: </h2>
    <p style="font-weight: 500;font-size: 20px;"><?php echo $detail["productDesc"] ?></p>
    <?php foreach ($so_comment as $value) : ?>
      <h3 style="margin-top: 30px;">Bình luận (<?php echo $value["so_luong"] ?>)</h3>
    <?php endforeach ?>

    <form style="" action="./controller/add_cmt.php?id=<?php echo $id ?>" method="post">
      <!-- <textarea name="content" id="" cols="80" rows="6" style="resize: none;outline: none;padding: 15px;font-size: 20px;"></textarea> -->
      <input id="content" oninput="return comment()" style="width: 60%; border: none;font-size: 20px; padding: 10px;;outline: none;border-bottom: 2px solid black;" type="text" name="content" placeholder="Viết bình luận...">
      <br>
      <div style="width: 60%; text-align: right;margin-top: 10px;" class="button">
        <button style="font-size: 20px;font-weight: 600;margin-right: 15px;" type="reset">Hủy</button>
        <?php if(!empty($_SESSION["id"])){?>
        <button id="submit" name="submit" disabled style="background-color: lavender; border-radius: 40px;color: black;font-weight: 500;font-size: 20px; padding: 0 10px;;" type="submit">Bình luận</button>
       <?php }else{ ?>
       <a href="./login"style="background-color: lavender; border-radius: 40px;color: black;font-weight: 500;font-size: 20px; padding:  10px;;" >Bình luận</a>
        <?php } ?>
      </div>
    </form>
    
    <div class="showcmt">

      <?php
      foreach ($show_cmt as $value) { ?>
        <div class="comment" style="display: flex;background-color: #f8f8f8;margin-top: 20px;padding: 20px;;">
          <img height="50px" width="50px" style="border-radius: 100%;" src="./src/image/<?php echo $value["avatar"]; ?>" alt="">
          <div class="led" style="margin-left: 10px;">
            <div style="display: flex; border-bottom: 1px dashed black;">
              <p style="font-size: 18px; font-weight: 500;"><?php echo $value["username"]; ?></p>
              <p style="margin-left: 10px;"><?php echo $value["date_cmt"]; ?></p>
            </div>
            <p style="margin-top: 10px; margin-bottom: 20px;"><?php echo $value["content"]; ?></p>
            <?php if(!empty($_SESSION["id"])){
              $id_person = $_SESSION["id"];
            
            if ($id_person == $value["id_user"]) { ?>
              <a id="delete" href="./controller/delete_cmt.php?id=<?php echo $value["id_cmt"]?>&idsp=<?php echo $id ?>">XÓA</a>
            <?php }
            } ?>
          </div>

        </div>

      <?php } ?>


    </div>
    <h2 style="background: linear-gradient(90deg,#97c93d,#4fba69);display: inline-block; padding: 10px;color:white;margin-top: 15px;">Các sản phẩm tương tự: </h2>
    <div class="product">
        <?php foreach($product as $value):?>
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
  

    <?php include "./template/footer.php" ?>

  </div>

</body>
<script>
         
  document.querySelector('#cart').addEventListener('click', () => {
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Thêm thành công',
        showConfirmButton: false,
        timer: 3500

      })
    }

  )
  var button = document.querySelector("#submit");
  var input = document.querySelector("#content");

  function comment() {
    console.log(input);
    console.log(button.disabled);
    if (input.value != "") {
      button.disabled = false;
      button.style.backgroundColor = "#4fba69";
      button.style.color = "white";
      button.style.cursor = "pointer";
    } else {
      button.disabled = true;
      button.style.backgroundColor = "lavender";
      button.style.color = "grey";
    }

  }
 
  function change_img(id) {
    let img = document.getElementById(id).getAttribute('src');
    document.getElementById('img_main').setAttribute('src', img)
    console.log(img);
  }
</script>

   <script>
    tippy('#user_hover', {
        content: '<a id="logout" href="./controller/log_out.php">Đăng xuất</a> <br> <a id="ql_tk" href="./view/account.php">Quản lý tài khoản</a> ',
        allowHTML: true, 
        placement: 'bottom-start',
        delay: [0, 1000],
        duration: [0, 1000],
        interactive: true,
        //  theme: 'light',
        
     
       
      });
    
    
  </script>
  <script>
     tippy('#show_cart', {
        arrow:false,
        content: `<?php if(!empty($cart)){ ?>
              <div class="show_cart"> 
             <?php foreach($cart as $id => $product):?> 


              <div class="iteam_cart"> 
              <a  href="./detail.php?id=<?php echo $product["id"] ?>">
             <p><?php echo $product["productName"] ?></p>
             <div class="typpy_colum">
             <img src="./src/image/<?php echo $product["images"] ?>" alt="">
             <div class="show_type">
            <p><?php echo $product["color"] ?> X <?php echo $product["quantity"] ?></p>
            <p><?php echo $product["productPrice"] ?>₫</p>
             </div>
             </div>
             </div>
             </a>
             
             <?php endforeach ?>
             <a class="view_cart_detail" href="./view/view_cart.php?id=">Xem chi tiết</a>
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
</html>