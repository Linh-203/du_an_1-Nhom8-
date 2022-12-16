
<?php
include "../model/connect.php";
session_start();
$non_coincidence ="";
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
  $sql = "SELECT * FROM vocher";
  $list_voucher = getAll($sql);
  
 
  if(isset($_POST["btn_voucher_save"])){
    if(!empty($_POST["code_voucher"])){
      $code_voucher = $_POST["code_voucher"];
      $query = "SELECT * FROM voucher_detail where id_user like n'$id_person' and id_voucher like n'$code_voucher'";
      $voucher_check = getOne($query);
    }
    if(empty($voucher_check)){
  foreach($list_voucher as $value){
    if($_POST["code_voucher"] ==  $value["code"] ){
      $code_voucher = $_POST["code_voucher"];
     $query = "INSERT INTO voucher_detail(id_user,id_voucher,quantity,status) values ('$id_person','$code_voucher',1,1)";
     connect($query);

     $query = "SELECT * FROM vocher where code like n'$code_voucher'";
      $check = getOne($query);
      if($check["quantity"]>1){
        $quantity = $check["quantity"] - 1;
      $query = "UPDATE vocher SET quantity = $quantity  where code like n'$code_voucher'";
      connect($query);
      }else{
        $query = "DELETE FROM vocher where code like n'$code_voucher' ";
        connect($query);
      }

      $alert = "Lưu voucher thành công";
      $non_coincidence ="";
    }else{
         $non_coincidence = "Rất tiếc mã này không chính xác, hoặc hết hạn";
    }
  }
}else{
      $query = "UPDATE voucher_detail SET quantity = quantity + 1 where id_user like n'$id_person' and id_voucher like n'$code_voucher' ";
      connect($query);
      $query = "SELECT * FROM vocher where code like n'$code_voucher'";
      $check =getOne($query);
      if($check["quantity"]>1){
      $query = "UPDATE vocher SET quantity = quantity - 1 where code like n'$code_voucher'";
      connect($query);
      }else{
        $query = "DELETE FROM vocher where code like n'$code_voucher'";
        connect($query);
      }
      $alert = "Lưu voucher thành công";

}
  }
 
 

 

 


?>
<!DOCTYPE html>
<html lang="en">

<?php include "./public/head.php" ?>
<style>
  #add_voucher{
    background-color: #ee4d2d;color: white;padding: 5px 20px;border-radius: 5px;margin-left: 175px;
    border: 1px solid #ee4d2d;
  }
  #add_voucher:hover{
    transition: 1s;
     background-color: white;
     color: #ee4d2d;
     border: 1px solid #ee4d2d;
  }
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
</style>

<body>
  <div class="container">
      <?php include "./public/header.php" ?>
    
        <?php if(!empty($alert)){?>
            <div class="alert" style="background-color: lightgreen;color: green;position: absolute;top: 0;right: 0;">
				<span style="font-weight: 500; font-size: 18px;"><img style="margin-right: 8px;" height="40px" src="../src/image/dung-removebg-preview.png" alt=""> <?php echo $alert ?></span>
				<button  class="close">&times;</button>
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
            <form action="./voucher_all.php" method="POST" style="display: flex;align-items: center;">
            <div class="form-group" style="display: flex;align-items: center;padding-top: 12px;">
      <label for="pwd">Mã voucher</label><div class="input">
      <input type="text" class="form-control" placeholder="Nhập mã voucher" name="code_voucher" style="margin: 0 10px;">
      <span style="color:red"><?php echo $non_coincidence ?></span>
      </div>
      </div>
       <button class="btn btn-primary" name="btn_voucher_save" type="submit" style="background-color:#28a745;">Lưu</button>
   
   
            </form>
            </div>
            <div class="voucher" style="display: grid;margin-top: 20px;grid-template-columns: repeat(2,1fr);grid-gap: 20px;">
            <?php foreach($voucher as $value): ?>
                <?php  $value["code"]
                
                ?>
                <div class="colum_voucher" style="display: flex;box-shadow: 0 0 20px lightgrey;">
                    <img style="height: 150px;" src="../src/image/<?php echo $value["img"] ?>" alt="">
                
                <div class="item" style="padding-left: 30px;padding-top: 20px;width: 100%;">
                <p style="font-size: 20px; font-weight: 500; color:#ee4d2d;">Giảm <?php echo $value["sale"] ?>%</p> 
              <p>Đơn Tối Thiểu: <?php echo $value["condition_V"] ?> ₫</p>
              <p>Số lượng: <?php echo $value["quantity"]  ?></p>
    <p> Có hiệu lực sau: 11 giờ</p>
    
    <form action="../controller/save_add_voucher.php?code=<?php echo $value["code"] ?>&sale=<?php echo $value["sale"] ?>" method="post">
    <button name="btn-add" type="submit" id="add_voucher" >Lưu</button>
    </form>
                </div>

            </div>
            <?php endforeach ?>
           
            </div>
            
            <hr>
            </article>
           
        </main>
   
   
  

   <?php include "./public/footer.php" ?>

  </div>
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