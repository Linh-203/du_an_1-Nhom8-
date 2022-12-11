<?php 
    include "../model/connect.php";
    $id = $_GET["id"];
    $id_prd = $_GET["id_prd"];
    $query ="DELETE FROM comment where id = $id";
    connect($query);
    header("location:../view/detail_comment.php?id=$id_prd");


?>