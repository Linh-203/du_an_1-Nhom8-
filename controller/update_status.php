<?php
 include "../model/connect.php";
 $id = $_GET["id"];
 $query = "SELECT * FROM oder where id = $id";
 $oder=getOne($query);
 $status = $_POST["status"];
 $date = $_POST["date"];
 if(empty($_POST["date"])){
   $_POST["date"] = $oder["received_date"];
 }
 $query = "UPDATE oder SET status = $status, received_date= '$date'  where id=$id";
 connect($query);
 header("location:../view/list_order.php");


?>