
<?php
include "../model/connect.php";
      session_start();
      ob_start();
     $id = $_GET["id"];
     $query = "SELECT * FROM oder where id=$id";
     $oder = getOne($query);
     $query = "SELECT *, oder_detail.quantity AS quantity_oder FROM oder_detail JOIN products ON oder_detail.id_product=products.id 
     JOIN oder ON oder_detail.id_order = oder.id
     where id_order=$id";
     $product = getAll($query);
     if (!empty($_SESSION["cart"])) {
      $cart = $_SESSION["cart"];
      $so_luong = count($cart);
  }
      

    ?>
<!DOCTYPE html>
<html lang="en">
<?php include "./public/head.php" ?>
<style>
  #b_huy{
    border: 1px solid #97c93d;
    transition: 1s;
    background-color: #97c93d;font-size: 20px;padding: 0 15px; border-radius: 5px;color: white;margin-top: 20px;
  }
  #b_huy:hover{
    opacity: 0.5;
  }
  #huy{
    transition: 1s;
    border: 1px solid #ee4d2d;
    background-color: #ee4d2d;padding: 0 15px;font-size: 20px; border-radius: 5px;color: white;margin-top: 20px;
  }
  #huy:hover{
    opacity: 0.5;
  }
    #img img{
        width: 100%;
    }
    #img{
       
        width: 150px;
    }
    #name{
        width: 650px;
    }
   
    table,td{
        height: 50px;
        
    }
    td img{
        width: 55%;
        height: auto;
    }
    table,td,th{
        padding: 10px;
        font-size: 20px;
        border-bottom: 10px solid #f7faff;
       border-collapse: collapse;

        
    }
    tr{
      
    }
    #price, #total{
        color:red
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
  
    
</style>
<body >
    <div class="container" style="background-color: rgba(245, 245, 245, 1);">
       
     <?php include "./public/header.php" ?>
        <p style="font-weight:500;color: black;margin-top: 20px;font-size: 30px;border-left: 5px solid #ee4d2d;;padding-left: 10px;">Chi ti???t h??a ????n</p>
        <hr>
        <main style="display: flex;padding: 40px 20px">
        <div class="info" style="font-size:20px;font-weight: 500;">
       <li>T??n ng?????i ?????t: <?php echo $oder["orderer"]?></li>  
       <li>S??? ??i???n tho???i: <?php echo $oder["phone"]?></li>
          <li>?????a ch??? nh???n h??ng: <?php echo $oder["adress"]?></li>
          <li>Th???i gian ?????t: <?php echo $oder["date"]?></li>
          <li>Tr???ng th??i: <?php 
         if($oder["status"]==0){ ?>
            Ch??? x??c nh???n 
    <?php    }else if($oder["status"]==1){ ?>
          Ch??? l???y h??ng

 <?php   }else if($oder["status"]==2){ ?>
          ??ang giao
 <?php }else if($oder["status"]==3){?>
         ???? nh???n h??ng
        <?php }else{?>
            
            ???? h???y
      <?php  }
        
        ?>
          <li> Thanh to??n: <?php  
          if($oder["pay"]==1){ ?>
            Ch??a thanh to??n
     <?php    }else{ ?>
             ???? thanh to??n
             <?php  }?>
     </li>
      <li>D??? ki???n ng??y nh???n: <?php echo $oder["received_date"]?></li>

          </div>
          <div class="sp" style="margin-left: 50px;">
         <table style="background-color: white;margin: auto;">
           
            <tbody>
                <?php foreach($product as $key => $value):?>
                <tr>
                 
                    <td id="img" ><img src="../src/image/<?php echo $value["productImage"];?>" alt=""></td>
                    <td id="name"><p> <?php echo $value["productName"];  ?></p>
                   <p> <?php echo $value["color"]; ?> x <?php echo $value["quantity_oder"]; ?></p> 
                    </td>
                    <td id="price"><?php echo $value["price"]?>???</td>
                  
                   
                </tr>
               
                <?php endforeach?>
                <tr><th id="total" colspan="5">T???ng ti???n h??ng: <?php echo $value["total_product"]?>???</th></tr> 
              
            </tbody>
         </table>
        
         <h3 style="color:red">T???ng thanh to??n: <?php echo $oder["total"]?>???</h3>
        
         <?php $id_oder = $oder["id"] ;
         ?>
          <form action="../controller/update_huy.php?id=<?php echo $id_oder ?>" method="post">
            <?php if($oder["status"]==0 || $oder["status"]==1){ ?>
                <button name="huy" id="huy" >H???y</button>
                <?php }else if($oder["status"]==4){ ?>
                     <button name="b_huy" id="b_huy" >B??? H???y</button>
             <?php   }else{ ?>
                <button name="huy" disabled style="opacity: 0.4;;background-color: #ee4d2d;padding: 0 15px;font-size: 20px; border-radius: 5px;color: white;margin-top: 20px;">H???y</button>

              <?php }  ?>
          </form>


         </div>
         </main>
        
                <?php include "./public/footer.php" ?>
    
    </div>
   <script>
    tippy('#user_hover', {
        content: '<a id="logout" href="./controller/log_out.php">????ng xu???t</a> <br> <a id="ql_tk" href="./view/account.php">Qu???n l?? t??i kho???n</a> ',
        allowHTML: true, 
        placement: 'bottom-start',
        delay: [0, 1000],
        duration: [0, 1000],
        interactive: true,
        //  theme: 'light',
        
     
       
      });
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
            <p><?php echo $product["productPrice"] ?>???</p>
             </div>
             </div>
             </div>
             </a>
             
             <?php endforeach ?>
             <a class="view_cart_detail" href="../view/view_cart.php?id=">Xem chi ti???t</a>
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
</body>
</html>