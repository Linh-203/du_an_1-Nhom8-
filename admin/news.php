<?php

    include ("controller/c_news.php");
    session_start();
    $news = new c_news();
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        if($act == 'add'){
            $news->add_news();
        }elseif($act == 'detail'){
            $news->detail_news();
        }elseif($act == 'edit'){
            $news->edit_news();
        }elseif($act == 'delete'){
            $news->delete_news();
        }
    }else{
        $news->show_news();
    }
?>