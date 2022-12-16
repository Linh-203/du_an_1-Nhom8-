
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
<?php include "./public/head.php" ?>
<style>
   a{
    text-decoration: none;
   }
   .tippy-content{
    
    background-color: #198a19;
    border-radius: 3px;
  }
  a{
    text-decoration: none;
  }
  #ql_tk, #logout{
    color: black;
    font-weight: 600;
  }
  #logout:hover, #ql_tk:hover{
    opacity: 0.5;
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
  #logout,#ql_tk{
    color: white;
    font-weight: 500;
  }
    
</style>
<body>
    <div class="container">
       
    <?php include "./public/header.php" ?>
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
        
                <?php include "./public/footer.php" ?>
    
    </div>
   
</body>
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
</script>
</html>