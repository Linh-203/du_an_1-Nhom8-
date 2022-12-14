<?php
include "../model/connect.php";
session_start();
$id = $_GET["id"];
$query = "SELECT * FROM oder where id=$id";
$oder = getOne($query);
$query = "SELECT *, oder_detail.quantity AS quantity_oder FROM oder_detail JOIN products ON oder_detail.id_product=products.id 
     JOIN oder ON oder_detail.id_order = oder.id
     where id_order=$id";
$product = getAll($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../src/css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Quicksand&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/969bec5078.js" crossorigin="anonymous"></script>
</head>
<style>
    #img img {
        width: 100%;
    }

    #img {

        width: 150px;
    }

    #name {
        width: 650px;
    }

    table,
    td {
        height: 50px;

    }

    td img {
        width: 55%;
        height: auto;
    }

    table,
    td,
    th {
        padding: 10px;
        font-size: 20px;
        border-bottom: 10px solid lavenderblush;
        border-collapse: collapse;


    }

    #price,
    #total {
        color: red
    }

    select {
        font-size: 20px;
        padding: 5px;
        font-weight: 500;
    }
</style>

<body>
    <div class="container" style="background-color: lavenderblush;">

        <header>
            <div class="left">
                <div class="logo" style="text-align: center;">
                    <img height="60px" src="../src/image/tech.png" alt="">
                    <h4 style="color: lightblue; font-weight: 600; font-size: 20px;">HIGHT-TEACH</h4>
                </div>
                <div class="menu">
                    <ul>
                        <li><a href=""><i class="fa fa-home-lg-alt"></i> Trang ch???</a></li>
                        <li><a href="">S???n ph???m</a></li>
                        <li><a href="">Tin t???c</a></li>
                        <li><a href="">Gi???i thi???u</a></li>

                    </ul>
                </div>
            </div>
            <div class="right">
                <form action="">
                    <input type="text" placeholder="T??m ki???m s???n ph???m...">
                    <button><i style="font-size: 20px; " class="fa fa-search"></i></button>
                </form>
                <div class="icon" style="display: flex;align-items: center;color: white;">
                    <i style="margin-right: 30px;" class="fa fa-clipboard"></i>
                    <a href="./view_cart.php?id="> <i style="margin-right: 30px;" class="fas fa-shopping-bag"></i></a>
                    <?php if (empty($_SESSION["id"])) { ?>
                        <i class="fas fa-user"></i>
                    <?php } else { ?>
                        <img height="30px" src="<?php echo $_SESSION["avatar"] ?>" alt="">
                    <?php } ?>

                </div>
            </div>
        </header>
        <main style="display: flex;padding: 40px 20px">
            <div class="info" style="font-size:20px;font-weight: 500;">
                <li>T??n ng?????i ?????t: <?php echo $oder["orderer"] ?></li>
                <li>S??? ??i???n tho???i: <?php echo $oder["phone"] ?></li>
                <li>?????a ch??? nh???n h??ng: <?php echo $oder["adress"] ?></li>
                <li>Th???i gian ?????t: <?php echo $oder["date"] ?></li>
                <li>Tr???ng th??i: <?php
                                if ($oder["status"] == 0) { ?>
                        Ch??? x??c nh???n
                    <?php    } else if ($oder["status"] == 1) { ?>
                        Ch??? l???y h??ng

                    <?php   } else if ($oder["status"] == 2) { ?>
                        ??ang giao
                    <?php } else if ($oder["status"] == 3) { ?>
                        ???? nh???n h??ng
                    <?php } else { ?>

                        ???? h???y
                    <?php  }

                    ?>
                <li> Thanh to??n: <?php
                                    if ($oder["pay"] == 1) { ?>
                        Ch??a thanh to??n
                    <?php    } else { ?>
                        ???? thanh to??n
                    <?php  } ?>
                </li>
                <li style="margin-bottom: 5px;">L???i nh???n: <?php echo $oder["note"] ?></li>
                <form action="../controller/update_status.php?id=<?php echo $id ?>" method="POST">
                    <label for="" style="color: green;font-weight: 600;">D??? ki???n ng??y nh???n</label>
                    <input type="date" name="date" value="<?php echo $oder["received_date"] ?>"> <br>
                    <select name="status" id="" style="margin-top: 10px;">
                        <option value="1" hidden>Ch??? l???y h??ng</option>
                        <option value="2">??ang giao</option>
                        <option value="3">???? nh???n h??ng</option>
                        <option value="4">???? h???y</option>

                    </select>
                    <button id="update" style="font-size: 20px;font-weight: 600; background: green;color:white;padding: 0 10px;">C???p nh???t</button>
                </form>

            </div>
            <div class="sp" style="margin-left: 50px;">
                <table style="background-color: white;margin: auto;">

                    <tbody>
                        <?php foreach ($product as $key => $value) : ?>
                            <tr>

                                <td id="img"><img src="../src/image/<?php echo $value["productImage"]; ?>" alt=""></td>
                                <td id="name">
                                    <p> <?php echo $value["productName"];  ?></p>
                                    <p> x <?php echo $value["quantity_oder"]; ?></p>
                                </td>
                                <td id="price"><?php echo $value["price"] ?>.000???</td>


                            </tr>

                        <?php endforeach ?>
                        <tr>
                            <th id="total" colspan="5">T???ng ti???n h??ng: <?php echo $value["total_product"] ?>.000???</th>
                        </tr>

                    </tbody>
                </table>
                <p>Ph?? v???n chuy???n:</p>
                <h3 style="display: flex;">T???ng thanh to??n:  <p style="color: red;margin-left: 10px;"> <?php echo $oder["total"] ?>.000???</p></h3>

            </div>
        </main>

        <footer>

        </footer>

    </div>

</body>

</html>