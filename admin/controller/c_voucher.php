<?php
require_once("model/m_voucher.php");
class c_voucher
{
    public function show_voucher()
    {
        $m_voucher = new m_voucher();
        $voucher = $m_voucher->read_voucher();
        $view = "view/voucher/v_voucher.php";
        include("template/front_end/layout.php");
    }
    public function add_voucher()
    {
        $m_voucher = new m_voucher();
        if (isset($_POST['btn-submit'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $errors = [];
                if (empty($_POST['price'])) {
                    $errors['price']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($_POST['condition'])) {
                    $errors['condition']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($_POST['turn'])) {
                    $errors['turn']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($_POST['date_out'])) {
                    $errors['date_out']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($_FILES['img']['name'])) {
                    $errors['img']['name']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($_POST['code'])) {
                    $errors['code']['require'] = 'Mục này không được để trống';
                } else if (!empty($_POST['code'])) {
                    $code = $_POST["code"];
                    $voucher = $m_voucher->read_voucher_by_code($code);
                    if (!empty($voucher)) {
                        $errors['code']['require'] = 'Mã này đã tồn tại !';
                    }
                }
                if (empty($errors)) {
                    $code = $_POST["code"];
                    $condition = $_POST["condition"];
                    $price = $_POST["price"];
                    $turn = $_POST["turn"];
                    $status = 1;
                    $date_out = $_POST["date_out"];
                    $img = ($_FILES['img']['error'] == 0) ? $_FILES['img']['name'] : "";
                    $result = $m_voucher->add_voucher($code, $price, $turn, $date_out, $img, $status, $condition);
                    if ($result) {
                        if ($img != "") {
                            move_uploaded_file($_FILES['img']['tmp_name'], "../src/image/" . $img);
                        }
                        $alert = "Thêm thành công";
                        header("location:./voucher.php?alert=$alert ");
                    } else {
                        echo "<script>alert('Thêm không thành công')</script>";
                    }
                }
            }
        }
        $view = "view/voucher/v_add_voucher.php";
        include("template/front_end/layout.php");
    }
    public function update_voucher()
    {
        include "../model/connect.php";
        $err = "";
        $m_voucher = new m_voucher();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $list_voucher = $m_voucher->read_voucher_by_id_voucher($id);
            if (isset($_POST['btn-submit'])) {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $errors = [];
                    if (empty($_POST['price'])) {
                        $errors['price']['require'] = 'Mục này không được bỏ trống';
                    }
                    if (empty($_POST['condition'])) {
                        $errors['condition']['require'] = 'Mục này không được bỏ trống';
                    }
                    if (empty($_POST['turn'])) {
                        $errors['turn']['require'] = 'Mục này không được bỏ trống';
                    }
                    if (empty($_POST['date_out'])) {
                        $errors['date_out']['require'] = 'Mục này không được bỏ trống';
                    }
                    if (empty($_POST['code'])) {
                        $errors['code']['require'] = 'Mục này không được để trống';
                    }
                    if (empty($errors)) {
                        
                        $code = $_POST["code"];
                        $condition = $_POST["condition"];
                        $sale = $_POST["price"];
                        $quantity = $_POST["turn"];
                        $status = 1;
                        $date_out = $_POST["date_out"];
                        if(empty($_FILES["img"]["name"])){
                           
                            $sql = "SELECT * FROM  vocher where code like n'$id'  ";
                            $check_img = getOne($sql);
                            $img = $check_img["img"];
                          }else{
                            $img = $_FILES["img"]["name"];

                          }
                          
                          $sql = "SELECT * FROM  vocher where code like n'$code'  ";
                          $check_code = getOne($sql);
                          
                        if (!empty($check_code) ) {
                            if($check_code["code"] == $id){
                                
                                $result = $m_voucher->update_voucher($code,$sale,$quantity,$img,$status,$date_out,$condition,$id);
                            
                                if ($result) {
                                    $alert = "Update thành công";
                                    header("location:./voucher.php?alert=$alert ");
                                }
                            }else{
                            $err = 'Mã đã tồn tại';
                            header("location: voucher.php?act=update&id=$id&alert=$err");
                            }
                        } else {
                            $result = $m_voucher->update_voucher($code,$sale,$quantity,$img,$status,$date_out,$condition,$id);
                            if ($result) {
                               
                                $alert = "Update thành công";
                                header("location:./voucher.php?alert=$alert ");
                            } else {
                                echo "<script>alert('Không thành công')</script>";
                            }
                        }
                    }
                }
            }
        }
        $view = "view/voucher/v_update_voucher.php";
        include("template/front_end/layout.php");
    }
    public function delete_voucher()
    {
        $m_voucher = new m_voucher();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $result = $m_voucher->delete_voucher($id);
            if($result){
                $alert = "Xóa thành công";
                header("location:./voucher.php?alert=$alert ");
            }else{
                echo "<script>alert('Xóa không thành công')</script>";
            }
        }
    }
}
