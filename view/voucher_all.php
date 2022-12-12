
<?php
include "../model/connect.php";
session_start();
if(!empty($_SESSION["cart"])){
    $cart = $_SESSION["cart"];
   }
  if (!empty($_SESSION["id"])) {
    $id_person = $_SESSION["id"];
  }
  if(!empty($_SESSION["cart"])){
    $cart = $_SESSION["cart"];
    $so_luong = count($cart);
  }
$query = "SELECT * FROM vocher";
$voucher = getAll($query);
$err = "";
// $color = $_SESSION["color"];
 
  if(!empty($_GET["alert"])){
    $alert = $_GET["alert"];
  }
 
 

 

 


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="../src/css/index.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Quicksand&family=Roboto:wght@100&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/969bec5078.js" crossorigin="anonymous"></script>
</head>
<style>
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
  .menu_ac a{
    padding: 15px 10px;
    display: inline-block;
    color: #131921;
    font-weight: bold;
    margin-top: 20px;
    letter-spacing: 1px;
  }
  .form-control{
    width: 400px;
  }
  input[type=file]{
    background-color: #ee4d2d;
  }
  .voucher img{
    width: 150px;
  }
  p{
    margin: 0;
  }
  .alert{
        animation-name:dich_chuyen;
        animation-iteration-count:infinite;
        animation-duration: 900ms ;
  }
  @keyframes dich_chuyen {
        0%   {right:0px;}
        100%  {right:100px;}
        
    }
    @keyframes identifier {
      
      
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
    
    <div class="menu" style="background-color: #232f3e;padding: 10px;margin-left: 0px;display: flex;justify-content: space-between;height: 43.2px;">
          <ul>
            <li><a href="./index.php"><i class="fa fa-home-lg-alt"></i> Trang chủ</a></li>
            <li><a href="">Sản phẩm</a></li>
            <li><a href="">Tin tức</a></li>
            <li><a href="">Giới thiệu</a></li>

          </ul>
          <font ><marquee direction="left" style="background:orange">Voucher khuyến mãi </marquee></font>
        </div>
        <?php if(!empty($alert)){?>
            <div class="alert" style="background-color: lightgreen;color: green;position: absolute;top: 0;right: 0;">
				<span style="font-weight: 500; font-size: 18px;"><img style="margin-right: 8px;" height="40px" src="../src/image/dung-removebg-preview.png" alt=""> <?php echo $alert ?></span>
				<button style="" class="close">&times;</button>
				</div>
  <?php } ?>
        <main style="display: flex;background-color: rgba(245, 245, 245, 1);" >
            <aside style="width: 25%;padding-left: 50px; padding-top: 50px;">
               <div class="avatar" style="display: flex;align-items: center;">
                <img style="border-radius: 50%;" height="90px" width="90px" src="../src/image/<?php echo $_SESSION["avatar"] ?>" alt="">
                <div class="edit" style="margin-left: 10px;">
                    <p style="font-weight: 600;"><?php echo $_SESSION["username"] ?></p>
                    <a href="./account.php" style="color: gray;"><i class="fas fa-pencil"></i>Sửa hồ sơ</a>
                </div>
            </div>
            <div class="menu_ac">
            <a href="./account.php"><i class="fa-regular fa-id-badge" style="margin-right: 5px;font-size: 20px;"></i> Tài khoản của tôi</a> <br>
            <a href="./change_pass.php" style=" "><i style="font-size: 20px;margin-right: 5px;" class="fab fa-expeditedssl" style="margin-right: 3px;"></i> Đổi mật khẩu</a> <br>
            <a href="./list-bill.php"><i class="fas fa-money-bill-alt" style="font-size: 20px; margin-right: 5px;"></i> Đơn mua</a> <br>
            <a  style="background-color: #f05a66; width: 83%;color:white"  href="./voucher.php"> <i class="fas fa-tags" style="font-size: 20px;margin-right: 5px;"></i> Ưu đãi cho bạn</a> <br>
            <a href="./adress.php"><i style="font-size: 20px;margin-right: 5px;" class="fa-solid fa-map-location-dot"></i> Địa chỉ</a> <br>
            <a href=""><i style="font-size: 20px;margin-right: 5px;" class="fas fa-bell"></i> Thông báo</a> <br>

            </div>
            </aside>
            <article style="margin-top: 50px; width: 70%;background-color: white;padding-left: 50px;padding-top: 20px;">
            <h2 style="border-left: 5px solid #ee4d2d;padding-left: 10px;display: inline;">Kho voucher</h2>
            <hr>
            <div class="content" style="display: flex;align-items: center; justify-content: space-between;background-color: rgba(245, 245, 245, 1);padding: 15px 30px;margin-right: 50px;">
            <div class="menu_child">
            <a  class="btn btn-primary" href="./voucher_all.php" style="background-color: #337ab7; padding: 10px;color: white;">Tất cả</a>
            <a class="btn btn-primary" href="./voucher.php" style="padding: 10px;color: black;border: 1px solid lightgrey;background:none;" >Của tôi</a>
            </div>
            <form action="" method="POST" style="display: flex;align-items: center;">
            <div class="form-group" style="display: flex;align-items: center;padding-top: 12px;">
      <label for="pwd">Mã voucher</label>
      <input type="text" class="form-control" placeholder="Nhập mã voucher" name="code_voucher" style="margin: 0 10px;">
      </div>
       <button class="btn btn-primary" name="" type="submit" style="background-color:#28a745;">Lưu</button>
   
            </form>
            </div>
            <div class="voucher" style="display: grid;margin-top: 20px;grid-template-columns: repeat(2,1fr);grid-gap: 20px;">
            <?php foreach($voucher as $value): ?>
                <?php  $value["code"]
                
                ?>
                <div class="colum_voucher" style="display: flex;box-shadow: 0 0 20px lightgrey;">
                    <img style="height: 150px;" src="<?php echo $value["img"] ?>" alt="">
                
                <div class="item" style="padding-left: 30px;padding-top: 20px;width: 100%;">
                <p style="font-size: 20px; font-weight: 500; color:#ee4d2d;">Giảm <?php echo $value["sale"] ?>%</p> 
              <p>Đơn Tối Thiểu: <?php echo $value["condition_V"] ?> ₫</p>
              <p>Số lượng: <?php echo $value["quantity"]  ?></p>
    <p> Có hiệu lực sau: 11 giờ</p>
    
    <form action="../controller/save_add_voucher.php?code=<?php echo $value["code"] ?>&sale=<?php echo $value["sale"] ?>" method="post">
    <button name="btn-add" type="submit" style="background-color: #ee4d2d;color: white;padding: 5px 20px;border-radius: 5px;margin-left: 175px;">Lưu</button>
    </form>
                </div>

            </div>
            <?php endforeach ?>
           
            </div>
            </div>
            <hr>
            </article>
           
        </main>
   
   
  

    <footer>

    </footer>

  </div>
   <script>
    function notify() {
			$.notify("Access granted", "success");
		}
   </script>
</body>

<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
   <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
   <script>
    
    
    
     tippy('#show_cart', {
        arrow:false,
        content: `<?php
        $index=0;
          ?>
              <div class="show_cart"> 
             <?php foreach($cart as $id => $product):?> 


              <div class="iteam_cart"> 
              <a  href="./detail.php?id=<?php echo $product["id"] ?>">
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
             <a class="view_cart_detail" href="./view/view_cart.php?id=">Xem chi tiết</a>
             </div>
         `,
        allowHTML: true, 
        placement: 'bottom',
        delay: [0, 1000],
        duration: [0, 1000],
        interactive: true,
      });
      $(document).ready(function(){
  $(".close").click(function(){
    $(".alert").alert("close");
  });
});
  </script>
</html>