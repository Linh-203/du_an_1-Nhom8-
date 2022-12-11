<?php
require_once("model/m_news.php");
class c_news {
    public function show_news(){
        $m_news = new m_news();
        $news = $m_news->read_news();
        $view = "view/news/v_news.php";
        include ("template/front_end/layout.php");
    }
    public function add_news(){
        $m_news = new m_news();
        if (isset($_POST['btn-submit'])) {
            if ($_SERVER["REQUEST_METHOD"] == 'POST') {
                $errors = [];
                if (empty($_POST['name'])) {
                    $errors['name']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($_FILES['image']['name'])) {
                    $errors['image']['name']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($_POST['note'])) {
                    $errors['note']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($_POST['idcategory'])) {
                    $errors['idcategory']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($errors)) {
                    $name = $_POST['name'];
                    $note = $_POST['note'];
                    $idcategory = $_POST['idcategory'];
                    $image = ($_FILES['image']['error'] == 0) ? $_FILES['image']['name'] : "";

                    $result = $m_news->add_news($name,$image,$note,$idcategory);
                    if ($result) {
                        if ($image != "") {
                            move_uploaded_file($_FILES['image']['tmp_name'], "../src/image/" . $image );
                        }
                        echo "<script>alert('Thành công')</script>";
                    } else {
                        echo "<script>alert('Thêm không thành công')</script>";
                    }
                }
            }
        }
        $categories = $m_news->read_category();
        $view = "view/news/v_addnews.php";
        include ("template/front_end/layout.php");
    }
    public function detail_news(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $m_news = new m_news();
            $news = $m_news->read_news_by_id_news($id);
            $view = "view/news/v_news_detail.php";
            include ("template/front_end/layout.php");
        }        
    }
    public function edit_news(){
        $m_news = new m_news();
        if (isset($_GET['id'])) {
            $id = $_GET["id"];
            $news = $m_news->read_news_by_id_news($id);
            if (isset($_POST['btn-submit'])) {
                if ($_SERVER["REQUEST_METHOD"] == 'POST') {
                    $errors = [];
                if (empty($_POST['name'])) {
                    $errors['name']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($_POST['note'])) {
                    $errors['note']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($_POST['idcategory'])) {
                    $errors['idcategory']['require'] = 'Mục này không được bỏ trống';
                }
                    if (empty($errors)) {
                        $name = $_POST['name'];
                        $note = $_POST['note'];
                        $idcategory = $_POST['idcategory'];
                        $image = $_FILES['image']['name'] ? $_FILES['image']['name'] : $_POST['old_image'];
                        
                        $result = $m_news->edit_news($id,$name,$image,$note,$idcategory);
                        if ($result) {
                            if ($image != "") {
                                move_uploaded_file($_FILES['image']['tmp_name'], "../src/image/" . $image );
                            }
                            echo "<script>alert('Thành Công')</script>";
                            header("location: news.php");
                        } else {
                            echo "<script>alert('Thêm không thành công')</script>";
                        }
                        }
                }
            }
        }
        $categories = $m_news->read_category();
        $view = "view/news/v_editnews.php";
        include ("template/front_end/layout.php");
    }
    public function delete_news(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $m_news = new m_news();
            $result = $m_news->delete_news($id);
            if($result){
                header("location: news.php");
                echo "<script>alert('Thành Công')</script>";
            }else{
                echo "<script>alert('Xóa không thành công')</script>";
            }
        }
    }
}

?>