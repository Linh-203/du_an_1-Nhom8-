<?php
  session_start();
  if(empty($_SESSION["id"])){
    header("location:/du_an_1/login");
}
    include ("controller/c_product.php");
    $product = new c_product();

    if(isset($_GET['act'])){
        $act = $_GET['act'];
        if($act == 'add'){
            $product->addproduct();  
        }elseif($act == "edit"){
            $product->editproduct();  
        }elseif($act == "detail"){
            $product->detailproduct();
        }elseif($act == "delete"){
            $product->deleteproduct();
        }
    }else{
        $product->showproduct();  
    }
?>