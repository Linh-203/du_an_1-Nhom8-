<?php 
include "../model/connect.php";
ob_start();
if(!empty($_GET["type"])){
  $alert = $_GET["type"];
}
  $code = $_GET["id"];
  $sql = "SELECT * FROM vocher where code like n'$code'";
  $voucher_detail = getOne($sql);
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="about__component">
            <div class="about_form">
                <form action="./save_update_voucher.php" class='form' method="POST" enctype="multipart/form-data">
                     <input name="id_voucher" type="text" value="<?php echo $voucher_detail["code"] ?>" hidden>

                    <div class="form_group">
                        <label for="">Nhập mã code</label>
                        <input class='' type="text" name="code" value="<?php echo $voucher_detail["code"]?>">
                        <span id="err" style="color:red"><?php if(!empty($alert)) echo $alert ?></span>
                         
                    </div>
                    <div class="form_group">
                        <label for="">Nhập mệnh giá %</label>
                        <input class='' type="number" name="price" min="1" max="100" value="<?php echo $voucher_detail["sale"]?>"> 
                        

                    </div>
                    <div class="form_group"> 
                       <label for=""> Đơn hàng tối thiểu </label>
                       <input type="text" name="condition" value="<?php echo $voucher_detail["condition_V"]?>"> 
                      
                    </div>
                    <div class="form_group">
                        <label for="">Số lượng</label>
                        <input class='' type="number" name="turn" value="<?php echo $voucher_detail["quantity"]?>"> 
                     

                    </div>
                    <div class="form_group">
                        <label for="">Ngày hết hạn</label>
                        <input class='' type="date" name="date_out" value="<?php echo $voucher_detail["out_of_date"]?>">
                       
                    </div>
                    <div class="form_group">
                    <label for="">Banner</label>
                    <input type="file" name="img" id="" value="<?php echo $voucher_detail["img"]?>">
                   

                    </div>
                    <div class="btn_add">
                        <button name="btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
</body>
</html>