<?php 
include "../model/connect.php";
$id_oder = $_GET["id"];
if(isset($_POST["huy"])){  
   $sql = "UPDATE oder SET status = 4 where id = $id_oder";
   connect($sql);
}else  if(isset($_POST["b_huy"])){
$sql = "UPDATE oder SET status = 0 where id = $id_oder";
connect($sql);
} 
           header("location:../view/bill_detail.php?id=$id_oder");
                    ?>