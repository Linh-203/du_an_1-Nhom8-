<?php
 include "../model/connect.php";
 session_start();
 $id_person = $_SESSION["id"];
 $id_prd = $_GET["id"];
 $content = $_POST["content"];
 $query= "INSERT INTO comment(id_user,id_product,content) values('$id_person','$id_prd','$content')";
 connect($query);
 header("location:../detail.php?id=$id_prd");
 

?>