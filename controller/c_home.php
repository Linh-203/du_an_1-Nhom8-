<?php 
 @session_start();

 function render(){
    include "./model/m_product.php";
    $m_product = new m_product();
    $category = $m_product -> category();
    $new = $m_product -> product_new();
    $selling = $m_product -> product_selling();



if(!empty($_SESSION["id"])){
    $id_person = $_SESSION["id"];
   }
   if (!empty($_SESSION["cart"])) {
    $so_luong = count($_SESSION["cart"]);
  }


  $view = "./view/home/v_home.php";
  include "./template/layout.php";
 }
?>