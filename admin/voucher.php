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
        }else if($act == "delete"){
            $voucher->delete_voucher();
        }else if($act == "update"){
            $voucher ->update_voucher();
        }
    }else{
       
        $voucher->show_voucher();
    }
?>