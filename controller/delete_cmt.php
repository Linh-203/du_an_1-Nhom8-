<?php 
    include "../model/connect.php";
    $id = $_GET["id"];
    $id_sp = $_GET["idsp"];
    $query ="DELETE FROM comment where id = $id";
    connect($query);
    header("location:../detail.php?id=$id_sp");


?>