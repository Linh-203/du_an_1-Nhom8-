
<?php
include "../model/connect.php";
session_start();
 
$err = "";
// $color = $_SESSION["color"];
 if(!empty($_SESSION["cart"])){
  $cart = $_SESSION["cart"];
 }
if (!empty($_SESSION["id"])) {
  $id_person = $_SESSION["id"];
}else{
  header("location:../login");
}
if(!empty($_SESSION["cart"])){
  $cart = $_SESSION["cart"];
  $so_luong = count($cart);
}
  $alert ="";
  $nameErr = $phoneErr = $emailErr =$codeErr="";
 
 
if(isset($_POST["submit"])){
 
   
    $_SESSION["username"] = $_POST["username"];
    $name = $_SESSION["username"];
    $_SESSION["email"] = $_POST["email"];
    $email = $_SESSION["email"];
    $_SESSION["phone"] = $_POST["phone"];
    $phone = $_SESSION["phone"];
  
    if(empty($_POST["username"])){
        $nameErr=" Tên đăng nhập không được bỏ trống !";
      }
      if(empty($_POST["email"])){
        $emailErr="Email không được bỏ trống !";
      }
      if(empty($_POST["phone"])){
        $phoneErr="Số điện thoại không được bỏ trống !";
      }
      if(empty($_FILES["avatar"]["name"])){
        $avatar = $_SESSION["avatar"] ;
      }else{
          $_SESSION["avatar"] = $_FILES["avatar"]["name"];
          $avatar = $_SESSION["avatar"];
      }
    if(!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["phone"]) ){
     
     
          $query = "UPDATE users SET username = '$name', avatar ='$avatar', email = '$email', phone = '$phone'
          where id like n'$id_person' ";
         connect($query);
         move_uploaded_file($_FILES["avatar"]["tmp_name"],"../src/image/".$_FILES["avatar"]["name"]);
         $alert = "Lưu thành công";
        
      }else{
    $query = "UPDATE users SET username = '$name', avatar ='$avatar', email = '$email', phone = '$phone'
     where id like n'$id_person' ";
    connect($query);
    move_uploaded_file($_FILES["avatar"]["tmp_name"],"../src/image/".$_FILES["avatar"]["name"]);
    $alert = "Lưu thành công";
}}

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
            <a href="./account.php" style="background-color: #ee4d2d; width: 83%;color:white" ><i class="fa-regular fa-id-badge" style="margin-right: 5px;font-size: 20px;"></i> Tài khoản của tôi</a> <br>
            <a href="./change_pass.php"><i style="font-size: 20px;margin-right: 5px;" class="fab fa-expeditedssl" style="margin-right: 3px;"></i> Đổi mật khẩu</a> <br>
            <a href="./list-bill.php"><i class="fas fa-money-bill-alt" style="font-size: 20px; margin-right: 5px;"></i> Đơn mua</a> <br>
            <a href="./voucher.php"> <i class="fas fa-tags" style="font-size: 20px;margin-right: 5px;"></i> Ưu đãi cho bạn</a> <br>
            <a href="./adress.php"><i style="font-size: 20px;margin-right: 5px;" class="fa-solid fa-map-location-dot"></i> Địa chỉ</a> <br>
            <a href=""><i style="font-size: 20px;margin-right: 5px;" class="fas fa-bell"></i> Thông báo</a> <br>

            </div>
            </aside>
            <article style="margin-top: 50px; width: 70%;background-color: white;padding-left: 50px;padding-top: 30px;">
          <h2 style="border-left: 5px solid #ee4d2d;padding-left: 10px;display: inline;">  Hồ sơ của tôi</h2>
 
 <hr>
            <form style="display: flex; justify-content: space-between;" method="POST" enctype="multipart/form-data">
               
            <div class="info">
                <?php if(!empty($alert)){ ?>
            <div class="alert" style="background-color: lightgreen;color: green;">
				<span style="font-weight: 500; font-size: 18px;"><img style="margin-right: 8px;" height="40px" src="../src/image/dung-removebg-preview.png" alt=""> <?php echo $alert ?></span>
				<button  class="close">&times;</button>
				</div>
                <?php } ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Mã đăng nhập</label>
    <input id="code" disabled type="text" name="code" class="form-control" value="<?php echo $_SESSION["id"] ?>">
    <span style="color:red"><?php echo $codeErr?></span>

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Tên đăng nhập</label>
    <input type="text" name="username" class="form-control" value="<?php echo $_SESSION["username"] ?>">
    <span style="color:red"><?php echo $nameErr?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" name="email" class="form-control" value="<?php echo $_SESSION["email"] ?>" >
    <span style="color:red"><?php echo $emailErr?></span>

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Số điện thoại</label>
    <input type="text" name="phone" class="form-control" value="<?php echo $_SESSION["phone"] ?>"  >
    <span style="color:red"><?php echo $phoneErr?></span>

  </div>
  <button type="submit" name="submit" class="btn btn-primary">Lưu thay đổi</button>
  </div>
  <div class="edit_avatar">
               <img width="150px" height="150px" style="border-radius: 50%;" src="../src/image/<?php echo $_SESSION["avatar"] ?>" alt="">
                <input type="file" style="margin-top: 20px;" name="avatar">
            </div>
 
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