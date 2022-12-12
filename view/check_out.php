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
        $_SESSION["adress"] = $_POST["adress"];
        header("location:../vnpay_php");
    }
}

if (isset($_POST["submit"])) {

    if (empty($_POST["adress"])) {
        $adressErr = "Không được bỏ trống";
    }else{
        $note = $_POST["note"];
        $pay = 0;
        $status = $_POST["status"];
        $username = $_POST["username"];
        $adress = $_POST["adress"];
        $phone = $_POST["phone"];
        $count_money2 = $_SESSION["money"];
        $total2 = $_SESSION["total"];
        // $tinh = $_POST["tinh"];
        // $huyen = $_POST["huyen"];
        // $xa = $_POST["xa"];

        $query = "INSERT INTO oder(orderer,phone,adress,pay,total_product,total,status,id_user,note)
    values('$username','$phone', '$adress', '$pay', '$count_money2', '$total2','$status','$id_person','$note')";
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

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../src/css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Quicksand&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/969bec5078.js" crossorigin="anonymous"></script>
</head>
<style>
    #oder{
        transition: linear 1s;
        background-color: #E4002B;cursor: pointer;font-size: 20px;color: white;padding: 0 20px;margin: 10px 0;border-radius: 35px;width: 400px;
    }
    #oder:hover{
        background-color: white;
        border: 1px solid #E4002B;
        color: #E4002B;
    }
    #oder2{
        transition: linear 1s;
        border: 1px solid #4fba69;
        cursor: pointer;display: flex;align-items: center;justify-content: center;background: linear-gradient(90deg,#97c93d,#4fba69);;color:white;width: 400px;padding: 20px;font-size: 20px;border-radius: 35px;
    }
    #oder2:hover{
        background:none;
        border: 1px solid #4fba69;
        color: #4fba69;
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
                        <img height="35px" style="border-radius: 50%;" src="<?php echo $_SESSION["avatar"] ?>" alt="">
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
            <font>
                <marquee direction="left" style="background:orange">Voucher khuyến mãi </marquee>
            </font>
        </div>
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
                    <?php if (empty($tien)) { ?>
                        <div class="thanh" style="background-color: lavender;">
                        <?php } else { ?>
                            <div class="thanh" style="background-color: rgb(0, 182, 240);">
                            <?php } ?>
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
                        <!-- <label for="">Địa chỉ nhận hàng:</label> <br> -->
                        <!-- <select name="tinh" id="province" >
                   
            </select> 
            <select name="huyen" id="district">
                <option  value="">Chọn quận</option>
            </select>  <br>
            <select name="xa" id="ward">
                <option   value="">Chọn phường</option>
            </select> <br> -->
                        <label for="">Địa chỉ cụ thể:</label> <br>
                        <input style="" type="text" name="adress" id="" value="<?php
                                                                                $query = "SELECT * FROM oder where id_user like n'$id_person'";
                                                                                $adress_user = getOne($query);
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
                        <label for="">Chọn hình thức thanh toán:</label> <br>
                        <button id="oder" onclick="return confirm('Bạn chắc chứ')"  type="submit" name="submit">Nhận hàng rồi thanh toán</button>

                        <!-- <input style="width: 18px;height: 18px;" type="radio" name="pay" id="dialog" value="1"> Nhận hàng rồi thanh toán <br> -->
                        <!-- <div id="vi" style="display: none;background-color: lavenderblush;padding: 10px;">
                            <p style="display: flex;align-items: center;"> <img height="30px" style="margin-right: 10px;" src="https://fptsupport.com.vn/wp-content/uploads/2020/12/icon-thanh-toan.png" alt="">Sau khi nhận hàng kiểm tra rồi thanh toán</p>
                        </div> -->
                        <!-- <input style="width: 18px;height: 18px;" type="radio" name="pay" id="dialog2" value="1"> Thanh toán trực tuyến <br> -->
                       

                            <button id="oder2"  type="submit" name="vnpay">
                                <img height="40px" style="margin-right: 10px;" src="https://play-lh.googleusercontent.com/DvCn_h3AdLNNDcv3ftqTqP83gw6h65GMEPg3x6u788wB3F3ENNFcHgrHcWJNOPy4epg" alt=""> Thanh toán bằng VNPAY
                            </button>

                       
                    

                     
                        <!-- <button type="reset" style="background-color: #1a9cb7;color: white; padding:0 10px;font-size: 20px;">Nhập lại</button> -->
                    </form>

                </div>
                <div class="cart" style="margin-left: 50px;width: 55%;">
                    <table border="1" style="border-collapse: collapse;">
                        <thead>
                            <tr style="background-color: rgb(194, 225, 255);">
                                <th>Sản phẩm</th>
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
                                        <p style="color: red;"><?php echo $product["color"] ?></p>
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
                    <form action="" method="post" style="margin-top: 30px;">

                        <?php
                        if (!empty($_SESSION["id"])) {
                            $id_person = $_SESSION["id"];
                        }
                        $query = "SELECT * FROM vocher join voucher_detail ON vocher.code = voucher_detail.id_voucher
                        where id_user like n'$id_person' and $count_money > condition_V ";
                        $vouchers = getAll($query);
                        ?>

                        <select name="voucher" id="voucher" oninput="return sale()" style="border-radius: 5px;">
                            <option value="" hidden>Mã giảm giá</option>

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
                        <button disabled name="ap_ma" id="ap" style="background-color:lavender; font-size: 20px;padding: 5px;border-radius: 5px; ">Áp dụng</button>
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


                            // if ($index == 0) {
                            //     echo "Mã ko trùng";
                            //     $tong_tien = $total;

                            // }
                        }
                    } else {
                        $tong_tien2 = $total;
                        $_SESSION["total"] = $tong_tien2;
                    }

                    ?>
                    <h3 style="margin: 10px 0;font-weight: 500; display: flex;align-items: center;">
                        <p style="color: green;margin-right: 10px;"> Đơn vị vận chuyển:</p>
                        Vận chuyển nhanh quốc tế <br>
                        Standard Express <br>
                        <p style="margin-left: 20px;"> <?php echo $ship ?>₫</p>
                    </h3>



                    <h2 style=" font-weight: 500;display: flex;">Tổng thanh toán: <p style="color: red;margin-left: 5px;"><?php

                                                                                                                            echo $tong_tien2; ?>₫



                        </p>
                    </h2>
                </div>
            </main>

            <footer>
                <?php
                if (!empty($tien)) {
                    echo '<script>
                var input_check = document.querySelector("#dialog2");
                input_check.checked =true;
            </script>';
                }
                ?>
            </footer>

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
</script>

</html>