<?php
session_start();
if(empty($_SESSION["id"])){
    header("location:/du_an_1/login");
}
    include ("controller/c_doanh_thu.php");
    $doanh_thu = new c_doanh_thu();
    $doanh_thu->show_doanh_thu();
?>