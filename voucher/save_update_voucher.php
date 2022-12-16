<?php 
    include "../model/connect.php";
    $id_voucher = $_POST["id_voucher"]; // mã voucher ban đầu
  if(isset($_POST["btn-submit"])){
        $code = trim($_POST["code"]);         // mã voucher ở from input
        $condition = $_POST["condition"];
        $sale = $_POST["price"];
        $quantity = $_POST["turn"];
        $date_out = $_POST["date_out"];
        $img = $_FILES["img"]["name"]; 
          if(empty($_FILES["img"]["name"])){
            $sql = "SELECT * FROM  vocher where code like n'$id_voucher'";
            $check_img = getOne($sql);
            $img = $check_img["img"];
          }else{
            $img = $_FILES["img"]["name"];
          }
          $sql = "SELECT * FROM  vocher where code like n'$code'  ";
          $check_code = getOne($sql);
            if(!empty($check_code)){
              if($check_code["code"] == $id_voucher){
                $query = "UPDATE vocher SET code = '$code', sale = '$sale', quantity = '$quantity', out_of_date = '$date_out',img = '$img',condition_V = '$condition' where code like n'$id_voucher'";
                connect($query);
                 move_uploaded_file($_FILES["img"]["tmp_name"],"../src/image/".$_FILES["img"]["name"]);
                 $successful = "Thành công";
                    header("location:./list_voucher.php?alert=$successful");
              }else{
              $alert = "trùng mã";
              header("location:./update_voucher.php?id=$id_voucher&type=$alert");
              }
            }else{
              $query = "UPDATE vocher SET code = '$code', sale = '$sale', quantity = '$quantity', out_of_date = '$date_out',img = '$img',condition_V = '$condition' where code like n'$id_voucher'";
              connect($query);
               move_uploaded_file($_FILES["img"]["tmp_name"],"../src/image/".$_FILES["img"]["name"]);
               $successful = "Thành công";
                  header("location:./list_voucher.php?alert=$successful");
      
      }
    
    
    }
  

?>