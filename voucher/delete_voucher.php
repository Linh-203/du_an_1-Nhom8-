<?php
include "../model/connect.php";
  $id = $_GET["id"];
  $sql = "DELETE FROM vocher where code like n'$id'";
  connect($sql);
  header("location:./list_voucher.php");

?>