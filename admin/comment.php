<?php
session_start();
if(empty($_SESSION["id"])){
    header("location:/du_an_1/login");
}
    include ("controller/c_comment.php");
    $comment = new c_comment();
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        if($act == 'delete'){
            $comment->delete_comment();
        }else if($act == 'detail'){
             $comment ->detail_comment();
        }
    }else{
        $comment->show_comment();
    }
?>