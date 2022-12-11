<?php
require_once("model/m_user.php");
class c_user {
    public function show_user(){
        $m_user = new m_user();
        $users = $m_user->read_user();
        $view = "view/user/v_user.php";
        include ("template/front_end/layout.php");
    }
    public function add_user(){
        $m_user = new m_user();
        if (isset($_POST['btn-submit'])) {
            if ($_SERVER["REQUEST_METHOD"] == 'POST') {
                $errors = [];
                if (empty($_POST['username'])) {
                    $errors['username']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($_POST['id'])) {
                    $errors['id']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($_POST['phone'])) {
                    $errors['phone']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($_POST['email'])) {
                    $errors['email']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($_FILES['avatar']['name'])) {
                    $errors['avatar']['name']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($_POST['pass'])) {
                    $errors['pass']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($errors)) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];
                    $status = $_POST['status'];
                    $role = $_POST['role'];
                    $id = $_POST['id'];
                    $phone = $_POST['phone'];
                    $avatar = ($_FILES['avatar']['error'] == 0) ? $_FILES['avatar']['name'] : "";

                    $result = $m_user->add_user($id,$username,$email,$pass,$avatar,$role,$phone,$status);
                    if ($result) {
                        if ($avatar != "") {
                            move_uploaded_file($_FILES['avatar']['tmp_name'], "../src/image/" . $avatar );
                        }
                        echo "<script>alert('Thành công')</script>";
                    } else {
                        echo "<script>alert('Thêm không thành công')</script>";
                    }
                }
            }
        }
        $view = "view/user/v_adduser.php";
        include ("template/front_end/layout.php");
    }
    public function edit_user(){
        $m_user = new m_user();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $users = $m_user->read_user_by_id_user($id);
            if (isset($_POST['btn-submit'])) {
                if ($_SERVER["REQUEST_METHOD"] == 'POST') {
                    $errors = [];
                    if (empty($_POST['username'])) {
                        $errors['username']['require'] = 'Mục này không được bỏ trống';
                    }
                    if (empty($_POST['phone'])) {
                        $errors['phone']['require'] = 'Mục này không được bỏ trống';
                    }
                    if (empty($_POST['email'])) {
                        $errors['email']['require'] = 'Mục này không được bỏ trống';
                    }
                    if (empty($_POST['pass'])) {
                        $errors['pass']['require'] = 'Mục này không được bỏ trống';
                    }
                    if (empty($errors)) {
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $pass = $_POST['pass'];
                        $status = $_POST['status'];
                        $role = $_POST['role'];
                        $phone = $_POST['phone'];
                        $avatar = $_FILES['avatar']['name'] ? $_FILES['avatar']['name'] : $_POST['old_avatar'];
                        
                        $result = $m_user->edit_user($id,$username,$email,$pass,$avatar,$role,$phone,$status);
                        if ($result) {
                            if ($avatar != "") {
                                move_uploaded_file($_FILES['avatar']['tmp_name'], "../src/image/" . $avatar );
                            }
                            echo "<script>alert('Thành Công')</script>";
                            header("location: user.php");
                        } else {
                            echo "<script>alert('Thêm không thành công')</script>";
                        }
                        }
                }
            }
        }
        $view = "view/user/v_edituser.php";
        include ("template/front_end/layout.php");
    }

    public function delete_user(){
        $m_user = new m_user();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $result = $m_user->delete_user($id);
            if($result){
                header("location: user.php");
                echo "<script>alert('Thành Công')</script>";
            }else{
                echo "<script>alert('Xóa không thành công')</script>";
            }
        }
    }
}

?>