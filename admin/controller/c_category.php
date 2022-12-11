<?php
require_once("model/m_category.php");
class c_category {
    public function show_category(){
        $category = new m_category;
        $categories = $category->read_category();
        $view = "view/category/v_category.php";
        include ("template/front_end/layout.php");
    }
    public function add_category(){
        if(isset($_POST['btn-submit'])){
            if($_SERVER['REQUEST_METHOD']== 'POST'){
                $errors = [];
                if(empty($_POST['categoryName'])){
                    $errors['ten_loai']['require'] = 'Mục này không được bỏ trống';
                }
                if(empty($_POST['date'])){
                    $errors['date']['require'] = 'Mục này không được bỏ trống';
                }
                if(empty($_FILES['image']['name'])){
                    $errors['image']['name']['require'] = 'Mục này không được bỏ trống';
                }
                if(empty($_FILES['banner']['name'])){
                    $errors['banner']['name']['require'] = 'Mục này không được bỏ trống';
                }
                if(empty($errors)){
                    $categoryName = $_POST['categoryName'];
                    $date = $_POST['date'];
                    $image = ($_FILES['image']['error'] == 0) ? $_FILES['image']['name'] : "";
                    $banner = ($_FILES['banner']['error'] == 0) ? $_FILES['banner']['name'] : "";
                    $category = new m_category;
                    $result = $category->inser_category($categoryName,$date,$image,$banner);
                    if($result){
                        if ($image != "" && $banner != "") {
                            move_uploaded_file($_FILES['image']['tmp_name'], "../src/image/" . $image );
                            move_uploaded_file($_FILES['banner']['tmp_name'], "../src/image/" . $banner  );
                        }
                        echo "<script>alert('thành công')</script>";
                    }else{
                        echo "<script>alert('thêm không thành công')</script>";
                    }
                }
            }
        }
        $view = "view/category/v_addcategory.php";
        include ("template/front_end/layout.php");
    }
    public function edit_category(){
        $category = new m_category;
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $categories = $category->read_category_by_id_category($id);
            if (isset($_POST['btn-submit'])) {
                if ($_SERVER["REQUEST_METHOD"] == 'POST') {
                    $errors = [];
                    if(empty($_POST['categoryName'])){
                        $errors['ten_loai']['require'] = 'Mục này không được bỏ trống';
                    }
                    if(empty($_POST['date'])){
                        $errors['date']['require'] = 'Mục này không được bỏ trống';
                    }
                    if(empty($errors)){
                        $id = $_POST['id'];
                        $categoryName = $_POST['categoryName'];
                        $date = $_POST['date'];
                        $image = $_FILES['image']['name'] ? $_FILES['image']['name'] : $_POST['old_image'];
                        $banner = $_FILES['banner']['name'] ? $_FILES['banner']['name'] : $_POST['old_banner'];
                        $category = new m_category;
                        $result = $category->edit_category($id,$categoryName,$date,$image,$banner);
                        if ($result) {
                            if ($image != "" && $banner != "") {
                                move_uploaded_file($_FILES['image']['tmp_name'], "../src/image/" . $image );
                                move_uploaded_file($_FILES['banner']['tmp_name'], "../src/image/" . $banner  );
                            }
                            echo "<script>alert('Thành Công')</script>";
                            header("location: category.php");
                        } else {
                            echo "<script>alert('Không thành công')</script>";
                        }
                    } 
                }
            }
        }
        $view = "view/category/v_editcategory.php";
        include ("template/front_end/layout.php");
    }
    public function delete_category(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $category = new m_category;
            $result = $category->delete_category($id);
            if($result){
                header("location:category.php");
                echo "<script>alert('Thành Công')</script>";
            }else{
                header("location:category.php");
                echo "<script>alert('Xóa không thành công')</script>";
            }
        }
    }
    
}

?>