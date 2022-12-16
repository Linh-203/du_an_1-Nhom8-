
<?php
include "../model/connect.php";
session_start();
$type = $_GET["type"];
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

  $query = "SELECT * FROM oder where id_user like n'$id_person' and status = $type";
  $list_bill = getAll($query);
  
 

?>
<!DOCTYPE html>
<html lang="en">
    <?php include "./public/head.php" ?>
<style>
   td #detail:hover{
    background-color: #fff;
    color: #05d34e;
  }
  td #detail{
    padding: 8px 15px;
    border: 1px solid #05d34e;
    background-color: #05d34e;
    color: #fff;
    border-radius: 20px;
    cursor: pointer;
    transition: .2s;
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
  .filterDiv {
  float: left;
  background-color: #2196F3;
  color: #ffffff;
  
  line-height: 100px;
  text-align: center;
  margin: 2px;
  display: none;
}

.show {
  display: block;
}



/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
}
table{
    width: 100%;
}
.title{
    background-color: #2196F3;
    border-radius: 5px;

}
.title th,td{
    padding: 25px 30px;
    font-size: 14px;
    text-transform: uppercase;
}
tr{
    box-shadow: 0px 0px 9px 0px rgb(0 0 0 / 10%)
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
            <a href="./account.php"  ><i class="fa-regular fa-id-badge" style="margin-right: 5px;font-size: 20px;"></i> Tài khoản của tôi</a> <br>
            <a href="./change_pass.php" style=" "><i style="font-size: 20px;margin-right: 5px;" class="fab fa-expeditedssl" style="margin-right: 3px;"></i> Đổi mật khẩu</a> <br>
            <a  style="background-color: #ee4d2d; width: 83%;color:white"  href="./list-bill.php"><i class="fas fa-money-bill-alt" style="font-size: 20px; margin-right: 5px;"></i> Đơn mua</a> <br>
            <a href="./voucher.php"> <i class="fas fa-tags" style="font-size: 20px;margin-right: 5px;"></i> Ưu đãi cho bạn</a> <br>
            <a href="./adress.php"><i style="font-size: 20px;margin-right: 5px;" class="fa-solid fa-map-location-dot"></i> Địa chỉ</a> <br>
            <a href=""><i style="font-size: 20px;margin-right: 5px;" class="fas fa-bell"></i> Thông báo</a> <br>

            </div>
            </aside>
            <article style="margin-top: 50px; width: 70%;background-color: white;padding: 0 50px;padding-top: 30px;">
             <h2 style="border-left: 5px solid #ee4d2d;display: inline;padding-left: 10px;">Đơn hàng của tôi</h2>
             <hr>

            <div id="myBtnContainer" style="display: flex;justify-content: space-between;align-items: center;">
<div>
  <a href="./list-bill.php"> <button class="btn active" onclick="filterSelection('all')"> Tất cả</button></a>
  <a href="./detail_status_bill.php?type=0"><button class="btn" onclick="filterSelection('cho_xac_nhan')"> Chờ xác nhận</button></a> 
  <a href="./detail_status_bill.php?type=1"><button class="btn" onclick="filterSelection('cho_lay_hang')"> Chờ lấy hàng</button></a> 
<a href="./detail_status_bill.php?type=2"> <button class="btn" onclick="filterSelection('dang_giao')"> Đang giao</button></a> 
 <a href="./detail_status_bill.php?type=3"><button class="btn" onclick="filterSelection('da_giao')"> Đã giao</button></a> 
 <a href="./detail_status_bill.php?type=4"> <button class="btn" onclick="filterSelection('da_huy')"> Đã hủy</button></a>
 </div>
 <img style="" height="100px" src="https://cdn.dribbble.com/users/1101613/screenshots/2570562/delivery-truck.gif" alt="">
</div>

<form action="./list-bill.php" method="post" style="display: flex;background-color: #eaeaea ;">
              <button name="btn-search" style="padding: 10px;"><i style="font-size: 20px;" class="fa fa-search"></i></button>
              <input name="search" placeholder="Tìm kiếm hóa đơn theo mã " type="text" style="width: 100%;border: none;background-color: #eaeaea;outline: none;">
             </form>
<table>
            <thead>
                <tr class="title">
                    <th>STT</th>
                    <th>Mã hóa đơn</th>
                    <th>Thanh toán</th>
                    <th>Trạng thái</th>
                    <th></th>
                   
                </tr>
            </thead>
            <tbody>
             <?php foreach($list_bill as $key => $value):?>
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
                    <td ><a id="detail" href="./bill_detail.php?id=<?php echo $value["id"]?>">Chi tiết</a></td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>

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