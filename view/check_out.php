<?php
include "../model/connect.php";
session_start();
ob_start();
if (!empty($_GET["id"])) {
    $tien = $_GET["id"];
}
//   unset( $_SESSION["cart"]);
if (!empty($_SESSION["cart"])) {
    $cart = $_SESSION["cart"];
    $so_luong = count($cart);
}
if(!empty($_SESSION["id"])){
    $id_person = $_SESSION["id"];
}
$query = "SELECT * FROM oder where id_user like n'$id_person'";
$adress_user = getOne($query);
$Err = "";
$ship = 50000;
$count_money = 0;
$tong_tien = 0;
$payErr = $adressErr = "";
$id_person = $_SESSION["id"];
  

if (isset($_POST["vnpay"])) {
    
  
    if (empty($_POST["adress"])) {

        $adressErr = "Không được bỏ trống";
    } else {
        $total  = $_SESSION["total"] ;
        $_SESSION["adress"] = $_POST["adress"];
         header("location:../vnpay_php?id=$total");
        
    }
}

if (isset($_POST["submit"])) {

    if (empty($_POST["adress"])) {
        $adressErr = "Không được bỏ trống";
    }else{
        $note = $_POST["note"];
        $pay = 1;
        $status = $_POST["status"];
        $username = $_POST["username"];
        $adress = $_POST["adress"];
        $phone = $_POST["phone"];
       
        $count_money2 = $_SESSION["money"];
        $total2 = $_SESSION["total"];
        $tinh = $_POST["tinh"];
        $huyen = $_POST["huyen"];
        $xa = $_POST["xa"];

        $query = "INSERT INTO oder(province,districts,ward,orderer,phone,adress,pay,total_product,total,status,id_user,note)
    values('$tinh','$huyen','$xa','$username','$phone', '$adress', '$pay', '$count_money2', '$total2','$status','$id_person','$note')";
        connect($query);
        if (!empty($query)) {
            $sql = "SELECT * from oder";
            $order = getAll($sql);
            foreach ($order as $value) {
                $id_oder = $value["id"];
                $_SESSION["code_vn"] = $id_oder;
            }

            foreach ($cart as $id => $value) {
                // var_dump($value);
                $query = "INSERT INTO oder_detail(id_order,id_product,quantity,price,color)
                values('$id_oder', '$value[id]', '$value[quantity]','$value[productPrice]','$value[color]')";
                connect($query);
                $id_prd = $value["id"];
                $quantity2 = $value["quantity"];

                $query = "SELECT * FROM products where id = $id_prd";
                $prd = getAll($query);
                foreach ($prd as $value) {
                    $id_prd = $value["id"];
                    $quantity = $value["quantity"];
                    $quantity_update = $quantity - $quantity2;
                }

                $query = "UPDATE products SET quantity = $quantity_update where id = $id_prd ";
                connect($query);
                unset($_SESSION["cart"]);
                $code = $_SESSION["code"];
                if ($_SESSION["quantity_voucher"] <= 1) {
                    $delete = "DELETE FROM voucher_detail where id_user like n'$id_person' and id_voucher like n'$code' ";
                    connect($delete);
                } else {
                    $sql = "UPDATE voucher_detail SET quantity = quantity - 1 where id_user like n'$id_person' and id_voucher like n'$code'";
                    connect($sql);
                }
                header("location:./alert.php");
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include "./public/head.php" ?>
<style>
    #ap{
        background-color:lavender; font-size: 20px;padding: 5px 10px;border-radius: 5px;
    }
    
    .tippy-content{
    
    background-color: #198a19;
    border-radius: 3px;
  }
  a{
    text-decoration: none;
  }
  #ql_tk, #logout{
    color: white;
    font-weight: 500;
    text-transform: uppercase;
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
    #oder{
        transition: linear 1s;
        background: linear-gradient(90deg,#97c93d,#4fba69);;cursor: pointer;font-size: 20px;color: white;padding: 0 20px;margin: 10px 0;border-radius: 35px;width: 400px;
    }
    #oder:hover{
        background: white;
        border: 1px solid #E4002B;
        
    }
    #oder2{
        transition: linear 1s;
        border: 1px solid #4fba69;
        cursor: pointer;display: flex;align-items: center;justify-content: center;background-color: #337ab7;color:white;width: 400px;padding: 20px;font-size: 20px;border-radius: 35px;
    }
    #oder2:hover{
        background: linear-gradient(90deg,#97c93d,#4fba69);
        border: 1px solid #4fba69;
       
    }
    .form_adress input {
        width: 400px;
        padding: 5px 10px;
        font-size: 20px;
        outline: none;
        margin-bottom: 10px;
        border: 1px solid #ccc;
       border-radius: 4px;
       color: #555;

    }

    .form_adress label {
        font-size: 20px;
        font-weight: 500;
    }

    #err {
        color: red;
    }

    table,




    table,
    td,
    th {
        padding: 10px;
        font-size: 20px;
        border: none;
        border-bottom: 2px solid lavender;
        text-align: center;
    }

    .tron {
        background-color: rgb(0, 182, 240);
        width: 30px;
        height: 30px;
        border-radius: 100%;
        text-align: center;
        color: white;
        line-height: 30px;


    }

    .tron p {
        margin-top: -10px;
        font-size: 20px;
        font-weight: bold;
    }

    .center {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: right;
    }

    .thanh {

        height: 10px;
        width: 400px;

    }

    .text {
        margin-left: -15px;
        font-size: 20px;
        margin-bottom: 15px;
    }

    .pay {
        margin-top: 10px;
    }

    select {
        font-size: 20px;
        border: 1px solid lightgray;
        padding: 5px 10px;
        margin-bottom: 10px;
    }
</style>

<body>
    <div class="container">
        <?php include "./public/header.php" ?>
        <div class="khoi" style="display: flex;align-items: center;margin-left: 300px; margin-top: 30px;">
            <div class="coy">
                <div class="text">
                    <p style="margin-left: -30px;">Đăng nhập</p>
                </div>
                <div class="center">
                    <div class="thanh" style="background-color: rgb(0, 182, 240);margin-right: -20px;">
                        <div class="tron" style="margin-left: -10px;">
                            <p>1</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="coy">
                <div class="text">
                    <p style="margin-left: -50px;">Địa chỉ nhận hàng</p>
                </div>
                <div class="center">
                  
                        <div class="thanh" style="background-color: lavender;">
                  
                            <div class="tron" style="margin-left: -10px;">
                                <p>2</p>
                            </div>
                            </div>
                        </div>
                </div>
                <div class="coy">
                    <div class="text">
                        <p style="margin-left: -29px;">Thanh toán</p>
                    </div>
                    <div class="center">
                        <div class="thanh" style="background:none;">
                            <div class="tron" style="margin-left: -10px;">
                                <p>3</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <main style="display: flex;justify-content: space-between;margin-top: 30px;">
                <div class="form_adress">
                    <form action="" method="POST">
                        <input type="text" value="0" name="status" hidden>
                        <label for="">Họ và tên:</label> <br>
                        <input type="text" name="username" id="" value="<?php echo $_SESSION["username"] ?>"> <br>

                        <label for="">Số điện thoại:</label> <br>
                        <input type="number" name="phone" id="" value="<?php echo $_SESSION["phone"] ?>"> <br>
                        <label for="">Địa chỉ nhận hàng:</label> <br> 
                         <select name="tinh" id="province" >
                           <option value=""></option>
            </select> 
            <select name="huyen" id="district">
                <option  value="">Chọn quận</option>
            </select>  <br>
            <select name="xa" id="ward">
                <option   value="">Chọn phường</option>
            </select> <br> 
                        <label for="">Địa chỉ cụ thể:</label> <br>
                        <input style="" type="text" name="adress" id="" value="<?php
                                                                                
                                                                                if (!empty($adress_user)) {
                                                                                    echo $adress_user["adress"];
                                                                                } else if (!empty($_SESSION["adress"])) {
                                                                                    echo $_SESSION["adress"];
                                                                                }
                                                                                ?>"><br>
                        <span id="err"><?php echo $adressErr ?></span> <br>
                        <label for="">Lời nhắn:</label> <br>
                        <input name="note" type="text" placeholder="Lưu ý cho người bán..." value="<?php if (!empty($_SESSION["note"])) {
                                                                                                          echo $_SESSION["note"];
                                                                                                    } ?>"> <br>
                        <?php if(!empty($cart)){ ?>
                        <label for="">Chọn hình thức thanh toán:</label> <br>
                        <button style="background-color: #337ab7;" id="oder" onclick="return confirm('Bạn chắc chứ')"  type="submit" name="submit">Thanh toán khi nhận hàng</button>

                        <!-- <input style="width: 18px;height: 18px;" type="radio" name="pay" id="dialog" value="1"> Nhận hàng rồi thanh toán <br> -->
                        <!-- <div id="vi" style="display: none;background-color: lavenderblush;padding: 10px;">
                            <p style="display: flex;align-items: center;"> <img height="30px" style="margin-right: 10px;" src="https://fptsupport.com.vn/wp-content/uploads/2020/12/icon-thanh-toan.png" alt="">Sau khi nhận hàng kiểm tra rồi thanh toán</p>
                        </div> -->
                        <!-- <input style="width: 18px;height: 18px;" type="radio" name="pay" id="dialog2" value="1"> Thanh toán trực tuyến <br> -->
                       

                            <button id="oder2"  type="submit" name="vnpay">
                                <img height="40px" style="margin-right: 10px;" src="../src/image/vnpay.png" alt=""> Thanh toán bằng VNPAY
                            </button>
                       <?php } ?>
                       
                    

                     
                        <!-- <button type="reset" style="background-color: #1a9cb7;color: white; padding:0 10px;font-size: 20px;">Nhập lại</button> -->
                    </form>

                </div>
                <div class="cart" style="margin-left: 50px;width: 60%;">
                <?php if(!empty($cart)){ ?>
                    <table border="1" style="border-collapse: collapse;">
                        <thead>
                            <tr style="background-color: rgb(194, 225, 255);">
                                <th style="width: 460px;">Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($cart as $id => $product) : ?>
                                <tr>
                                    <td style="width: ;display: flex;align-items: center;"><img width="20%" style="margin-right: 10px;" src="../src/image/<?php echo $product["images"] ?>">
                                        <p style="color: red;margin-right: 10px;">(<?php echo $product["color"] ?>)</p>
                                        <?php echo $product["productName"] ?>
                                    </td>

                                    <td style="text-align: center;"><?php echo $product["productPrice"] ?>₫</td>
                                    <td style="text-align: center;"> <?php echo $product["quantity"] ?></td>
                                    <td style="text-align: center;color: red;"><?php $result = $product["productPrice"] * $product["quantity"];
                                                                                echo $result ?>₫
                                    </td>

                                </tr>
                                <?php $count_money = $count_money + $result ?>
                            <?php endforeach ?>
                            <tr>
                                <th style="color: red;font-weight: 500;" id="tt" colspan="6">Tổng tiền hàng: <?php echo $count_money;
                                                                                                                $total = $count_money + $ship;
                                                                                                                //  $_SESSION["total"] = $total;
                                                                                                                $_SESSION["money"] = $count_money;
                                                                                                                ?>₫
                                </th>

                            </tr>


                        </tbody>
                    </table>
                    <h3 style="margin: 10px 0;margin-top: 30px;font-weight: 500; display: flex;align-items: center;font-size: 20px;">
                        <p style="color: green;margin-right: 10px;"> Đơn vị vận chuyển:</p>
                        Vận chuyển nhanh quốc tế <br>
                        Standard Express <br>
                        <p style="margin-left: 20px;"> <?php echo $ship ?>₫</p>
                    </h3>
                    <form action="" method="post" style="margin-top: 30px;">

                        <?php
                        if (!empty($_SESSION["id"])) {
                            $id_person = $_SESSION["id"];
                        }
                        $query = "SELECT * FROM vocher join voucher_detail ON vocher.code = voucher_detail.id_voucher
                        where id_user like n'$id_person' and $count_money > condition_V ";
                        $vouchers = getAll($query);
                        ?>

                        <select name="voucher" id="voucher" oninput="return sale()" style="border-radius: 4px;">
                            <option value="" hidden>Chọn voucher</option>

                            <?php foreach ($vouchers as $value) : ?>
                                <option id="option" value="<?php echo $value["sale"] ?>">Giảm: <?php if ($count_money > $value["condition_V"]) {
                                                                                                    echo $value["sale"]; ?>% với đơn hàng tối thiểu
                                <?php
                                                                                                } ?>
                                <?php
                                if ($count_money > $value["condition_V"]) {
                                    echo $value["condition_V"];
                                } ?>₫</option>
                            <?php endforeach ?>

                        </select>
                        <!-- <input style="width: 300px; font-size: 18px; padding: 8px;outline: none;" type="text" name="voucher" id="voucher" oninput="return sale()" >  -->
                        <!-- <button name="ap_ma" id="ap" disabled style="background-color: blueviolet;color:aliceblue;font-size: 20px; border: 1px solid red;">áp mã</button> -->
                        <button disabled name="ap_ma" id="ap" >Áp dụng</button>
                    </form>
                    <?php


                    $index = 0;
                    if (isset($_POST["ap_ma"])) {


                        if (!empty($_POST["voucher"])) {

                            $sale = $_POST["voucher"];
                            $phan_tram = $_POST["voucher"] / 100;

                            $sql = "SELECT * FROM vocher join voucher_detail ON vocher.code = voucher_detail.id_voucher
                                where id_user like n'$id_person' and sale = $sale";
                            $code_voucher = getOne($sql);
                            $_SESSION["code"] = $code_voucher["code"];
                            $_SESSION["quantity_voucher"] = $code_voucher["quantity"];
                            //    echo $_SESSION["quantity_voucher"];
                            //    echo  $_SESSION["code"];
                    ?>

                    <?php $tong_tien = $total * $phan_tram;
                            $tong_tien2 = $total - $tong_tien;


                            $index += 1;
                            $_SESSION["total"] = $tong_tien2;


                      
                        }
                    } else {
                        $tong_tien2 = $total;
                        $_SESSION["total"] = $tong_tien2;
                    }

                    ?>
                 



                    <h2 style=" font-weight: 500;display: flex;">Tổng thanh toán: <p style="color: red;margin-left: 5px;"><?php

                                                                                                                            echo $tong_tien2; ?>₫


                       
                        </p>
                    </h2>
                    <?php }else{ ?>
                        <div class="err" style="text-align: center;">
                         <img height="200px" src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/cart/9bdd8040b334d31946f49e36beaf32db.png" alt="">
                         <h3>Giỏ hàng của bạn trống</h3>
                         <a href="../product.php" style="background-color: #ee4d2d;color: #fff;padding: 10px 20px;">Mua ngay</a>
                         </div>
                        <?php } ?>
                </div>
            </main>

           <?php include "./public/footer.php" ?>

        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="../api.js"></script>
</body>

<script>
    $(document).ready(function() {
        $("#dialog").click(function() {
            $("#vi").slideToggle()
        })
    })

    $(document).ready(function() {
        $("#dialog2").click(function() {
            $("#vi2").slideToggle()
        })
    })

    var button = document.querySelector("#ap");
    var input = document.querySelector("#voucher");

    function sale() {
        console.log(input);
        console.log(button.disabled);
        if (input.value != "") {
            button.disabled = false;
            button.style.backgroundColor = "rgb(0, 182, 240";
            button.style.color = "white";
        } else {
            button.disabled = true;
            button.style.backgroundColor = "lavender";
            button.style.color = "grey";
        }

    }
    tippy('#user_hover', {
        content: '<a id="logout" href="../controller/log_out.php">Đăng xuất</a> <br> <a id="ql_tk" href="./account.php">Quản lý tài khoản</a> ',
        allowHTML: true, 
        placement: 'bottom-start',
        delay: [0, 1000],
        duration: [0, 1000],
        interactive: true,
        //  theme: 'light',
        
     
       
      });
    
     tippy('#show_cart', {
        arrow:false,
        content: `<?php
        $index=0;
          ?>
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
             <a class="view_cart_detail" href="./view_cart.php?id=">Xem chi tiết</a>
             </div>
         `,
        allowHTML: true, 
        placement: 'bottom',
        delay: [0, 1000],
        duration: [0, 1000],
        interactive: true,
      });
</script>

</html>