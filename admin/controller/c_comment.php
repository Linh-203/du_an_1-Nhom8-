<?php
require_once("model/m_comment.php");
class c_comment {
    public function show_comment(){
        $m_comment = new m_comment();
        $comments = $m_comment->read_detail_comment();
        $view = "view/comment/v_comment.php";
        include ("template/front_end/layout.php");
    }
    public function delete_comment(){
        $m_comment = new m_comment();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $result = $m_comment->delete_comment($id);
            header("location:comment.php");
        
        }
    }
    public function detail_comment(){
        $m_comment = new m_comment();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $detail_comments = $m_comment->detail_comment($id);
        
        }
        $view = "view/comment/v_detail_comment.php";
        include ("template/front_end/layout.php");
    }
}

?>