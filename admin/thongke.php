<?php
session_start();
if(empty($_SESSION["id"])){
    header("location:/du_an_1/login");
}
    include ("controller/c_thongke.php");
    $thongke = new c_thong_ke();
    $thongke ->show_thong_ke();
?>