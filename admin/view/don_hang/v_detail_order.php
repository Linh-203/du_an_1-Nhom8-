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
        border-bottom: 10px solid white;
        border-collapse: collapse;


    }
    .btn_edit {
        width: 150px;
        height: 40px;
        border-radius: 5px;
        border: none;
        background-color: green;
        margin-top: 10px;
    }
    .btn_edit:hover{
        background-color: #009000;
    }
    #price,
    #total {
        color: red
    }

    select {
        font-size: 20px;
        padding: 5px;
        font-weight: 500;
        border-radius: 5px;
    }
</style>
<div class="title_act" style="text-align: center;margin-top: 50px;margin-bottom:30px; background:#009CFF ; height: 60px">
    <h3 style="color: white; padding-top: 15px">ORDER - <?php echo strtoupper($_GET['act'])?></h3>
</div>
<?php if(!empty($_GET["alert"])){
   echo  $alert = $_GET["alert"];
} ?>
<div class="about__component">
    <div class="container" style="background-color: white;">
        <main style="display: flex;padding: 40px 20px">
            <div class="info" style="font-size:20px;font-weight: 500;">
                <li>Tên người đặt: <?php echo $order->orderer ?></li>
                <li>Số điện thoại: <?php echo $order->phone ?></li>
                <li>Địa chỉ nhận hàng: <?php echo $order->adress ?></li>
                <li>Thời gian đặt: <?php echo $order->date ?></li>
                <li>Trạng thái: <?php
                            if($order->status == 0){?>
                                Chờ xác nhận
                            <?php }else if ($order->status == 1) { ?>
                                Chờ lấy hàng
                            <?php }else if ($order->status == 2) { ?>
                                Đang giao
                            <?php }else if ($order->status == 3) { ?>
                                Đã nhận hàng
                            <?php } else { ?>
                                Đã hủy
                            <?php  }?>
                <li> Thanh toán: <?php
                                    if ($order->pay == 1) { ?>
                        Chưa thanh toán
                    <?php    } else { ?>
                        Đã thanh toán
                    <?php  } ?>
                </li>
                <li style="margin-bottom: 5px;">Lời nhắn: <?php echo $order->note ?></li>
                <form action="" method="POST">
                    <label for="" style="color: green;font-weight: 600;">Dự kiến ngày nhận</label>
                    <input type="date" name="date" value="<?php echo $order->received_date?>"><br>
                        <?php
                            if (!empty($errors['date']['require'])) {
                                echo '<span style="color:red">' . $errors['date']['require'] . '</span>';
                            }
                        ?>
                    <select name="status" id="" style="margin-top: 10px;">
                        <option value="1" hidden><?php
                            if($order->status == 0){?>
                                Chờ xác nhận
                            <?php }else if ($order->status == 1) { ?>
                                Chờ lấy hàng
                            <?php }else if ($order->status == 2) { ?>
                                Đang giao
                            <?php }else if ($order->status == 3) { ?>
                                Đã nhận hàng
                            <?php } else { ?>
                                Đã hủy
                            <?php  }?></option>
                        <option value="2">Đang giao</option>
                        <option value="3">Đã nhận hàng</option>
                        <option value="4">Đã hủy</option>

                    </select>
    
                    <select name="pay" id="">
                        <option value="1" hidden><?php if($order->pay == 1){ ?>
                            Chưa thanh toán 
                    <?php    }else if($order->pay == 2){ ?>
                        Đã thanh toán 
                      <?php } ?>
                            </option>
                        <option value="1">Chưa thanh toán</option>
                        <option value="2">Đã thanh toán</option>
                    </select> <br>
                    <button class='btn_edit' style="color: white" name="btn-submit">Update
                    </button>
                </form>

            </div>
            <div class="sp" style="margin-left: 50px;">
                <table style="background-color: white;margin: auto;">

                    <tbody>
                        <?php foreach ($product as $key => $value) : ?>
                            <tr>

                                <td id="img"><img src="../src/image/<?php echo $value->productImage; ?> " alt="" width="20%"></td>
                                <td id="name">
                                    <p> <?php echo $value->productName;  ?></p>
                                    <p> <?php echo $value->color;  ?></p>
                                    
                                    <p> x <?php echo $value->quantity_oder; ?></p>
                                </td>
                                <td id="price"><?php echo $value->price ?>₫</td>


                            </tr>

                        <?php endforeach ?>
                        <tr>
                            <th id="total" colspan="5">Tổng tiền hàng: <?php echo $value->total_product ?>₫</th>
                        </tr>

                    </tbody>
                </table>
                
                <h3 style="display: flex;">Tổng thanh toán:  <p style="color: red;margin-left: 10px;"> <?php echo $order->total ?>₫</p></h3>

            </div>
        </main>
    </div>
</div>