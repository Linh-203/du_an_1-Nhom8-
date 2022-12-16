<?php
   include "../model/connect.php";
   $query = "SELECT oder.status as name,
   COUNT(*) AS 'So_luong'
   FROM oder  
  GROUP BY oder.status";
  $thong_ke= getAll($query);
   $query ="SELECT COUNT(users.id) AS 'quantity' FROM users WHERE users.role = 2";
   $user = getOne($query);
   $query ="SELECT SUM(vocher.quantity) AS 'quantity' FROM vocher";
   $voucher = getOne($query);
  
   $query ="SELECT COUNT(oder.id) AS 'quantity' FROM oder ";
   $oder = getOne($query);
  
   $query ="SELECT COUNT(comment.content) AS 'quantity' FROM comment ";
   $comment = getOne($query);
  
   $query ="SELECT COUNT(category.id) AS 'quantity' FROM category ";
   $cate = getOne($query);
  
   $query ="SELECT SUM(products.quantity) AS 'quantity' FROM products ";
   $product = getOne($query);

?>
<div style="text-align: center;margin-top: 100px;"> 
    <h1 style="color: #009CFF;">Wellcome to HighTech Admin</h1>    
</div>
<script src="https://kit.fontawesome.com/969bec5078.js" crossorigin="anonymous"></script>
<style>
    .colum{
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 0 20px gainsboro;
        border-radius: 10px;
        padding:  20px;
        color: white;
        background-color: #28a745;
    }
    .colum span{
        font-size: 25px;
       
    }
    h3{
        color:aliceblue
    }
  .colum  i{
        font-size: 30px;
    }
</style>
 <div class="" style="margin-top: 30px;display: grid;grid-template-columns: repeat(3,1fr);grid-gap: 30px; padding: 0 50px;">
   <div class="colum">
    <div>
    <h3>Khách hàng</h3>
    <span><?php echo $user["quantity"] ?> </span>
    </div>
    <i class="fas fa-user"></i>
   </div>
   <div class="colum">
    <div>
    <h3>Sản phẩm</h3>
    <span><?php echo $product["quantity"] ?> </span>
    </div>
    <i class="fas fa-star-and-crescent"></i>
   </div>
   <div class="colum">
    <div>
    <h3>Bình luận</h3>
    <span><?php echo $comment["quantity"] ?> </span></div>
    <i class="fas fa-comments"></i>
   </div>
   <div class="colum">
   <div>
    <h3>Đơn hàng</h3>
    <span><?php echo $oder["quantity"] ?> </span></div>
    <i class="fas fa-clipboard-list"></i>
   </div>
   <div class="colum">
   <div>
    <h3>Loại sản phẩm</h3>
    <span><?php echo $cate["quantity"] ?> </span></div>
    <i class="fas fa-sticky-note"></i>
   </div>
   <div class="colum">
   <div>
    <h3>Voucher</h3>
    <span><?php echo $voucher["quantity"] ?> </span></div>
    <i class="fas fa-tags"></i>
   </div>
   
 </div>
 <div id="piechart"></div>
 