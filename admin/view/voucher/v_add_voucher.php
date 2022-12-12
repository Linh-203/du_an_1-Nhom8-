<?php 
include "../model/connect.php";
$err =$err1=$err2=$err3="";
  if(isset($_POST["btn-submit"])){
     if(empty($_POST["code"])){
       $err = "Không được bỏ trống";
     }
     if(empty($_POST["price"])){
        $err1 = "Không được bỏ trống";
      }
      if(empty($_POST["turn"])){
        $err2 = "Không được bỏ trống";
      }
      if(empty($_POST["date_out"])){
        $err3 = "Không được bỏ trống";
      }

      if(!empty($_POST["code"]) && !empty($_POST["price"]) && !empty($_POST["turn"]) && !empty($_POST["date_out"])){
       $code = $_POST["code"];
       $price = $_POST["price"];
       $turn = $_POST["turn"];
       $date_out = $_POST["date_out"];
       $query = "INSERT INTO vocher(code, sale, quantity, out_of_date,status) values('$code', '$price', '$turn', '$date_out',1)";
        connect($query);
        $alert = "Thêm thành công";
        //  header("location:./admin/voucher.php");

      }
  }

?>
 <span><?php if(!empty($alert)){
 echo $alert; }?></span>
<div class="title_act" style="text-align: center;margin-top: 50px;margin-bottom:30px; background:#009CFF ; height: 60px">
    <h3 style="color: white; padding-top: 15px">VOUCHER - <?php echo strtoupper($_GET['act'])?></h3>
</div>
<div class="about__component">
            <div class="about_form">
                <form action="./voucher.php?act=add" class='form' method="POST" enctype="multipart/form-data">
                    <div class="form_group">
                        <label for="">Nhập mã code</label>
                        <input class='' type="text" name="code" value="<?php if(!empty($_POST["code"])){
                            echo $_POST["code"];
                        } ?>">
                        <span id="err" style="color:red"><?php echo $err ?></span>
                       
                    </div>
                    <div class="form_group">
                        <label for="">Nhập mệnh giá %</label>
                        <input class='' type="number" name="price" min="1" max="200000" value="<?php if(!empty($_POST["code"])){
                            echo $_POST["price"];
                        } ?>"> 
                        <span id="err" style="color:red"><?php echo $err1 ?></span>

                    </div>
                    <div class="form_group">
                        <label for="">Số lượng</label>
                        <input class='' type="number" name="turn" value="<?php if(!empty($_POST["turn"])){
                            echo $_POST["turn"];
                        } ?>"> 
                        <span id="err" style="color:red"><?php echo $err2 ?></span>

                    </div>
                    <div class="form_group">
                        <label for="">Ngày hết hạn</label>
                        <input class='' type="date" name="date_out" value="<?php if(!empty($_POST["date_out"])){
                            echo $_POST["date_out"];
                        } ?>">
                        <span id="err" style="color:red"><?php echo $err3 ?></span>

                    </div>
                    <br>
                    <div class="btn_add">
                        <button name="btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>