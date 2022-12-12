
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
 $query = "SELECT * FROM oder where id_user like n'$id_person'";
 $adress = getAll($query);
 foreach($adress as $value){
    $adress_me = $value["adress"];
    $username = $value["orderer"];
    $phone = $value["phone"];

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
    
    <div class="menu" style="background-color: #232f3e;padding: 10px;margin-left: 0px;display: flex;justify-content: space-between;">
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
            <a   href="./voucher.php"> <i class="fas fa-tags" style="font-size: 20px;margin-right: 5px;"></i> Ưu đãi cho bạn</a> <br>
            <a style="background-color: #ee4d2d; width: 83%;color:white"  href="./adress.php"><i style="font-size: 20px;margin-right: 5px;" class="fa-solid fa-map-location-dot"></i> Địa chỉ</a> <br>
            <a href=""><i style="font-size: 20px;margin-right: 5px;" class="fas fa-bell"></i> Thông báo</a> <br>

            </div>
            </aside>
            <article style="margin-top: 50px; width: 70%;background-color: white;padding-left: 50px;padding-top: 20px;">
            <h2>Địa chỉ của tôi</h2> <button>THÊM ĐỊA CHỈ MỚI</button>  <hr>
            <div class="main" style="display: flex;align-items: center;justify-content: space-between;">
           
            <div >
             <p style="font-size: 20px;">Địa chỉ</p>
             <?php if(!empty($adress)){ ?>
             <span><?php echo $username ?>|</span>
             <span><?php echo $phone ?></span> <br>
             <span><?php echo $adress_me ?></span> <br>
             <?php } ?>
             <button style="border: 1px solid red;padding: 0px 5px; color:red;">Mặc định</button>
             </div>
             <div>
                <a href="">Cập nhật</a>
                <a href="">Xóa</a> <br>
                <button disabled>Thiết lập mặc định</button>
             </div>
             </div>
            </article>
           
        </main>
   
   
  

    <footer>

    </footer>

  </div>
   
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