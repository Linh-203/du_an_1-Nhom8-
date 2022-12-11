<?php
session_start();
if(empty($_SESSION["id"])){
    header("location:/du_an_1/login");
}
    include ("controller/c_donhang.php");
    $donhang = new c_donhang();
    if(isset($_GET['act'])){
       $act =  $_GET['act'];
       if($act == 'detail'){
            $donhang->detail_order();
       }
    }else{
        $donhang->show_don_hang();
    }
?>