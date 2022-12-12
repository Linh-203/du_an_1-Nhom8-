<?php
include "../model/connect.php";
session_start();
$alert = "";
$code = $_GET["code"];
$id_person = $_SESSION["id"];
$sql = "SELECT * FROM voucher_detail  
where id_user like n'$id_person' and id_voucher like n'$code' ";
$voucher = getOne($sql);
// var_dump($voucher);
if (!empty($voucher)) {
    $quantity = $voucher["quantity"] + 1;
    $sql = "UPDATE voucher_detail SET quantity = $quantity 
    where id_user like n'$id_person' and id_voucher like n'$code'";
    connect($sql);
    $sql1 = "UPDATE vocher SET quantity = quantity - 1 where code like n'$code' ";
    connect($sql1);
} else {
    $query = "INSERT INTO voucher_detail(id_user, id_voucher,status,quantity) values ('$id_person','$code',1,1)";
    connect($query);
    $sql1 = "UPDATE vocher SET quantity = quantity - 1 where code like n'$code' ";
    connect($sql1);
}
$alert = "Lưu voucher thành công ";
header("location:../view/voucher_all.php?alert=$alert");
