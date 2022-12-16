<?php 
include "../model/connect.php";
ob_start();
$err =$err1=$err2=$err3=$err4=$err5="";
  
  if(isset($_POST["btn-submit"])){
      
     
    
     if(empty($_POST["price"])){
        $err1 = "Không được bỏ trống";
      }
      if(empty($_POST["turn"])){
        $err2 = "Không được bỏ trống";
      }
      if(empty($_POST["date_out"])){
        $err3 = "Không được bỏ trống";
      }
      if(empty($_POST["condition"])){
        $err4 = "Không được bỏ trống";
      }
      if(empty($_FILES["img"]["name"])){
        $err5 = "Không được bỏ trống";
      }
      if(empty($_POST["code"])){
        $err = "Không được bỏ trống";
     }else 
         
      if( !empty($_POST["code"]) && !empty($_POST["price"]) && !empty($_POST["condition"]) && !empty($_POST["turn"]) && !empty($_POST["date_out"]) && !empty($_FILES["img"]["name"])){
        $code = $_POST["code"];
        $query = "SELECT * FROM vocher where code like n'$code'";
        if(!empty($voucher)){
            $err = "Mã này đã tồn tại !";
        }else{
        $code = $_POST["code"];
       $condition = $_POST["condition"];
       $price = $_POST["price"];
       $turn = $_POST["turn"];
       $date_out = $_POST["date_out"];
       $img = $_FILES["img"]["name"];
       $query = "INSERT INTO vocher(code, sale, quantity, out_of_date,status,img,condition_V) values('$code', '$price', '$turn', '$date_out',1,'$img',$condition)";
        connect($query);
        $alert = "Thêm thành công";
        move_uploaded_file($_FILES["img"]["tmp_name"],"../src/image/".$_FILES["img"]["name"]);

        //   header("location:./admin/voucher.php");
      }
      
    }
    }
  

?>
 <span><?php if(!empty($alert)){
 echo $alert; }?></span>
<div class="title_act" style="text-align: center;margin-top: 50px;margin-bottom:30px; background:#009CFF ; height: 60px">
</div>
<div class="about__component">
            <div class="about_form">
                <form action="" class='form' method="POST" enctype="multipart/form-data">
                    <div class="form_group">
                        <label for="">Nhập mã code</label>
                        <input class='' type="text" name="code" value="<?php if(!empty($_POST["code"])){
                            echo $_POST["code"];
                        } ?>">
                        <span id="err" style="color:red"><?php echo $err ?></span>
                       
                    </div>
                    <div class="form_group">
                        <label for="">Nhập mệnh giá %</label>
                        <input class='' type="number" name="price" min="1" max="100" value="<?php if(!empty($_POST["code"])){
                            echo $_POST["price"];
                        } ?>"> 
                        <span id="err" style="color:red"><?php echo $err1 ?></span>

                    </div>
                    <div class="form_group"> 
                       <label for=""> Đơn hàng tối thiểu </label>
                       <input type="text" name="condition" value="<?php if(!empty($_POST["condition"])){
                            echo $_POST["condition"];
                        } ?>"> 
                       <span id="err" style="color:red"><?php echo $err4 ?></span>
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
                    <div class="form_group">
                    <label for="">Banner</label>
                    <input type="file" name="img" id="" value="<?php if(!empty($_FILES["img"]["name"])){
                            echo $_FILES["img"]["name"];
                        } ?>">
                    <span id="err" style="color:red"><?php echo $err5 ?></span>

                    </div>
                    <div class="btn_add">
                        <button name="btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>