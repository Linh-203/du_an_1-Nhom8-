<?php
include ("model/m_product.php");
class c_product{
    public function showproduct(){
        $m_product = new m_product();
        $products = $m_product->read_product();
        $view = "view/product/v_product.php";
        include ("template/front_end/layout.php");

    }
    public function addproduct(){
        $m_product = new m_product();
        if (isset($_POST['btn-submit'])) {
            if ($_SERVER["REQUEST_METHOD"] == 'POST') {
                $errors = [];
                if (empty($_POST['productName'])) {
                    $errors['productName']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($_POST['productPrice'])) {
                    $errors['productPrice']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($_FILES['productImage']['name'])) {
                    $errors['productImage']['name']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($_POST['date'])) {
                    $errors['date']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($_POST['quantity'])) {
                    $errors['quantity']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($_POST['productDesc'])) {
                    $errors['productDesc']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($_POST['categoryId'])) {
                    $errors['category']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($errors)) {
                    $productName = $_POST['productName'];
                    $productPrice = $_POST['productPrice'];
                    $date = $_POST['date'];
                    $quantity = $_POST['quantity'];
                    $categoryId = $_POST['categoryId'];
                    $productDesc = $_POST['productDesc'];
                    $color_red= isset($_POST['color_red']) ? $_POST['color_red']:"";
                    $color_white= isset($_POST['color_white']) ? $_POST['color_white']:"";
                    $color_black= isset($_POST['color_black']) ? $_POST['color_black']:"";
                    $color_green= isset($_POST['color_green']) ? $_POST['color_green']:"";
                    $productImage = ($_FILES['productImage']['error'] == 0) ? $_FILES['productImage']['name'] : "";

                    $result = $m_product->insert_product($productName,$productImage,$productPrice,$productDesc,$date, $quantity,$categoryId,$color_red,$color_white,$color_black,$color_green);
                    if ($result) {
                        if ($productImage != "") {
                            move_uploaded_file($_FILES['productImage']['tmp_name'], "../src/image/" . $productImage );
                        }
                        echo "<script>alert('Thành công')</script>";
                    } else {
                        echo "<script>alert('Thêm không thành công')</script>";
                    }
                }
            }
        }
        $categories = $m_product->read_category();
        $view = "view/product/v_addproduct.php";
        include ("template/front_end/layout.php");
    }
    public function editproduct()
    {   
        $product = new m_product();
        if (isset($_GET['id'])) {
            $id = $_GET["id"];
            $products = $product->read_product_by_id_product($id);
            if (isset($_POST['btn-submit'])) {
                if ($_SERVER["REQUEST_METHOD"] == 'POST') {
                    $errors = [];
                    if (empty($_POST['productName'])) {
                        $errors['productName']['require'] = 'Mục này không được bỏ trống';
                    }
                    if (empty($_POST['productPrice'])) {
                        $errors['productPrice']['require'] = 'Mục này không được bỏ trống';
                    }
                    if (empty($_POST['date'])) {
                        $errors['date']['require'] = 'Mục này không được bỏ trống';
                    }
                    if (empty($_POST['quantity'])) {
                        $errors['quantity']['require'] = 'Mục này không được bỏ trống';
                    }
                    if (empty($_POST['productDesc'])) {
                        $errors['productDesc']['require'] = 'Mục này không được bỏ trống';
                    }
                    if (empty($_POST['categoryId'])) {
                        $errors['category']['require'] = 'Mục này không được bỏ trống';
                    }
                    if (empty($errors)) {
                        $productName = $_POST['productName'];
                        $productPrice = $_POST['productPrice'];
                        $date = $_POST['date'];
                        $sale = $_POST['sale'];
                        $quantity = $_POST['quantity'];
                        $new = $_POST['new'];
                        $selling = $_POST['selling'];
                        $categoryId = $_POST['categoryId'];
                        $productDesc = $_POST['productDesc'];
                        $color_red= isset($_POST['color_red']) ? $_POST['color_red']:"";
                        $color_white= isset($_POST['color_white']) ? $_POST['color_white']:"";
                        $color_black= isset($_POST['color_black']) ? $_POST['color_black']:"";
                        $color_green= isset($_POST['color_green']) ? $_POST['color_green']:"";
                        $productImage = $_FILES['productImage']['name'] ? $_FILES['productImage']['name'] : $_POST['old_productImage'];
                        
                        $result = $product->edit_product($id,$productName,$productImage,$productPrice,$productDesc,$date, $quantity,$categoryId,$selling,$color_red,$color_white,$color_black,$color_green);
                        if ($result) {
                            if ($productImage != "") {
                                move_uploaded_file($_FILES['productImage']['tmp_name'], "../src/image/" . $productImage );
                            }
                            echo "<script>alert('Thành Công')</script>";
                            header("location: product.php");
                        } else {
                            echo "<script>alert('Thêm không thành công')</script>";
                        }
                        }
                }
            }
        }
        $categories = $product->read_category();
        $view = "view/product/v_editproduct.php";
        include ("template/front_end/layout.php");
    }
    public function detailproduct(){
        $id = (int)$_GET['id'];
        $m_product = new m_product();
        $products = $m_product->read_product_by_id_product($id);
        $view = "view/product/v_detail_product.php";
        include ("template/front_end/layout.php");
    }
    public function deleteproduct(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $product = new m_product();
            $result = $product->delete_product($id);
            if($result){
                header("location: product.php");
                echo "<script>alert('Thành Công')</script>";
            }else{
                echo "<script>alert('Xóa không thành công')</script>";
            }
        }
    }
}
?>