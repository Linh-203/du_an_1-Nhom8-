
<?php
include "../model/connect.php";
session_start();

$alert = "";
// $color = $_SESSION["color"];
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
$query = "SELECT * FROM users where id like n'$id_person'";
$user = getOne($query);
  $passErr = $new_passErr= $re_passErr = "";
  $pass = $new_pass= $re_pass = "";

if(isset($_POST["bnt-pass"])){
    if(empty($_POST["pass"])){
        $passErr = "Không được bỏ trống !";
    }else if($_POST["pass"] != $user["pass"]){
        $passErr ="Mật khẩu sai !";
    }else{
       $pass = $_POST["pass"];
    }
    if(empty($_POST["new_pass"])){
        $new_passErr = "Không được bỏ trống !";
    }else{
        $new_pass = $_POST["new_pass"];
    }
    if(empty($_POST["re_pass"])){
        $re_passErr = "Không được bỏ trống !";
    }else if($_POST["new_pass"] != $_POST["re_pass"]){
        $re_passErr = "Mật khẩu xác nhận không trùng !";
    }else{
        $re_pass = $_POST["re_pass"];
    }

    if(!empty($pass) && !empty($new_pass) && !empty($re_pass) ){
        $query = "UPDATE users SET pass = '$new_pass' where id like n'$id_person'";
        connect($query);
         $alert = "Đổi mật khẩu thành công";
    }
}
  
 



?>
<!DOCTYPE html>
<html lang="en">
  <?php include "./public/head.php" ?>
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
</style>

<body>
  <div class="container">

   <?php include "./public/header.php" ?>
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
            <a href="./account.php" ><i class="fa-regular fa-id-badge" style="margin-right: 5px;font-size: 20px;"></i> Tài khoản của tôi</a> <br>
            <a  style="background-color: #ee4d2d; width: 83%;color:white"  href="./change_pass.php" style=" "><i style="font-size: 20px;margin-right: 5px;" class="fab fa-expeditedssl" style="margin-right: 3px;"></i> Đổi mật khẩu</a> <br>
            <a href="./list-bill.php"><i class="fas fa-money-bill-alt" style="font-size: 20px; margin-right: 5px;"></i> Đơn mua</a> <br>
            <a href="./voucher.php"> <i class="fas fa-tags" style="font-size: 20px;margin-right: 5px;"></i> Ưu đãi cho bạn</a> <br>
            <a href="./adress.php"><i style="font-size: 20px;margin-right: 5px;" class="fa-solid fa-map-location-dot"></i> Địa chỉ</a> <br>
            <a href=""><i style="font-size: 20px;margin-right: 5px;" class="fas fa-bell"></i> Thông báo</a> <br>

            </div>
            </aside>
            <article style="margin-top: 50px; width: 70%;background-color: white;padding-left: 50px;">
           <h2 style="border-left: 5px solid #ee4d2d; padding-left: 10px;">Đổi mật khẩu</h2> 
   <p> Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
   <hr>
            <form action="" method="POST">
            <?php if(!empty($alert)){ ?>
            <div  class="alert" style="background-color: lightgreen;color: green;width: 400px;">
				<span style="font-weight: 500; font-size: 18px;"><img style="margin-right: 8px;" height="40px" src="../src/image/dung-removebg-preview.png" alt=""> <?php echo $alert ?></span>
				<button style="" class="close">&times;</button>
				</div>
                <?php } ?>
    <div class="form-group">
      <label for="email">Mật khẩu hiện tại:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="pass">
      <span style="color:red"><?php echo $passErr ?></span>
    </div>
    <div class="form-group">
      <label for="pwd">Mật khẩu mới:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="new_pass">
      <span style="color:red"><?php echo $new_passErr ?></span>

    </div>
    <div class="form-group">
      <label for="pwd">Nhập lại mật khẩu mới:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="re_pass">
      <span style="color:red"><?php echo $re_passErr ?></span>

    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" name="bnt-pass" class="btn btn-primary">Đổi mật khẩu</button>
  </form>
            </article>
           
        </main>
   <?php include "./public/footer.php" ?>
   
  

   

  </div>
  <script>
    tippy('#user_hover', {
        content: '<a id="logout" href="../controller/log_out.php">Đăng xuất</a> <br> <a id="ql_tk" href="./account.php">Quản lý tài khoản</a> ',
        allowHTML: true, 
        placement: 'bottom-start',
        delay: [0, 1000],
        duration: [0, 1000],
        interactive: true,
        //  theme: 'light',
        
     
       
      });
  </script>

</body>

<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
   <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
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
      $(document).ready(function(){
  $(".close").click(function(){
    $(".alert").alert("close");
  });
});
  </script>
</html>