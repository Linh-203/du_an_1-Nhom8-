<?php 
include "../model/connect.php";
$id = $_GET["id"];
if(isset($_POST["bo_huy"])){
                   $b_huy = $_POST["bo_huy"];
                   $query1 = "UPDATE oder SET status=$b_huy  where id=$id";
                   connect($query1);
                }

                if(isset($_POST["huy"]) ){
                $huy = $_POST["huy"];
                $query = "UPDATE oder SET status=$huy  where id=$id";
                connect($query);  
                }
 header("location:../view/bill_detail.php?id=$id");
                    ?>