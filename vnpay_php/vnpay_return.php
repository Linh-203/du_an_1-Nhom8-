<?php
     session_start();
     
     
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>VNPAY RESPONSE</title>
        <!-- Bootstrap core CSS -->
        <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">         
        <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <?php
        require_once("./config.php");
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        ?>
        <!--Begin display -->
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">VNPAY RESPONSE</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label >Mã đơn hàng:</label>

                    <label><?php echo date("YmdHis") ?></label>
                </div>    
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label><?php echo $_GET['vnp_Amount'] ?></label>
                </div>  
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã phản hồi (vnp_ResponseCode):</label>
                    <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label><?php echo $_GET['vnp_PayDate'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Kết quả:</label>
                    <label>
                        <?php
                        include "../model/connect.php";
                        $cart = $_SESSION["cart"];
                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {

                                echo "<span style='color:blue'>GD Thanh cong</span>";
                                 
                              $note =  $_SESSION["note"] ;
                              $adress =  $_SESSION["adress"] ;
                              $phone =  $_SESSION["phone"] ;
                              $username =  $_SESSION["username"] ;
                              $count_money2 =  $_SESSION["money"];
                              $total2 =  $_SESSION["total_update"]; 
                              $id = $_SESSION["id"] ;
                              $pay = 2;       
                              $status =0;
                                 
                                $query = "INSERT INTO oder(orderer,phone,adress,pay,total_product,total,status,id_user,note)
                                values('$username','$phone', '$adress', '$pay', '$count_money2', '$total2','$status','$id','$note')";
                                connect($query);
                                if(!empty($query)){
                                        $sql = "SELECT * from oder";
                                        $order = getAll($sql);      
                                        foreach($order as $value){
                                        $id_oder = $value["id"];
                                        $_SESSION["code_vn"] = $id_oder;
                                        }
                                       
                                        foreach ($cart as $id => $value) {
                                        // var_dump($value);
                                            $query = "INSERT INTO oder_detail(id_order,id_product,quantity,price,color)
                                            values('$id_oder', '$value[id]', '$value[quantity]','$value[productPrice]','$value[color]')";
                                             connect($query);
                                               unset($_SESSION["cart"]);
                                               header("location:../view/alert.php");
                            
                                              
                                             
                                        } 
                                    }   

                                
                            } else {
                                echo "<span style='color:red'>GD Khong thanh cong</span>"; ?>
                                <a href="../view/check_out.php">Trở về</a>
                          <?php  } ?>
                      <?php  } else {
                            echo "<span style='color:red'>Chu ky khong hop le</span>";
                        }
                        ?>

                    </label>
                </div> 
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                   <p>&copy; VNPAY <?php echo date('Y-m-d')?></p>
                  
                   <a href="../view/check_out.php?id=<?php echo $tien ?>">Quay lại đặt hàng</a>
            </footer>
           
        </div>  
    </body>
    <script>

    </script>
</html>
