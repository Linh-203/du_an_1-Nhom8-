<?php
session_start();
if(empty($_SESSION["id"])){
    header("location:/du_an_1/login");
}
    include ("controller/c_voucher.php");
    $voucher = new c_voucher();
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        if($act == 'add'){
            $voucher->add_voucher();
        }elseif($act == "delete"){
            $voucher->show_voucher();
        }
    }else{
       
        $voucher->show_voucher();
    }
?>