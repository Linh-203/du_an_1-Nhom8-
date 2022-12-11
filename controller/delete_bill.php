<?php
session_start();
  include "../model/connect.php";
  $id = $_GET["id"];
  $query = "DELETE FROM oder where id = $id";
  connect($query);
  header("location:../view/list_bill.php");


?>