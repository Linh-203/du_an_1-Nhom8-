<?php
require_once("model/m_order.php");
class c_donhang {
    public function show_don_hang(){
        $m_order = new m_order();
        $orders = $m_order->read_order();
        $view = "view/don_hang/v_don_hang.php";
        include ("template/front_end/layout.php");
    }
    public function detail_order(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $m_order = new m_order();
            $orders = $m_order->read_order();
            $order = $m_order->read_order_by_id_order($id);
            $product = $m_order->read_detail_order($id);
            if ($_SERVER["REQUEST_METHOD"] == 'POST') {
                $errors = [];
                if (empty($_POST['date'])) {
                    $errors['date']['require'] = 'Mục này không được bỏ trống';
                }
                if (empty($errors)) {
                    $status = $_POST['status'];
                    $received_date = $_POST['date'];
                    $pay = $_POST["pay"];
                    $result = $m_order->update_order($id,$status,$received_date,$pay);
                    if ($result) {
                
                        $alert = "Cập nhật thành công ";
                        header("location:./don_hang.php?act=detail&id=$id&alert=$alert");
                        
                    } else {
                        echo "<script>alert('Update không thành công')</script>";
                    }
                }
            }
            $view = "view/don_hang/v_detail_order.php";
            include ("template/front_end/layout.php");
        }else{
            $m_order = new m_order();
            $orders = $m_order->read_order();
            echo "<script>alert('Không tìm thấy mã đơn hàng??')</script>";
            $view = "view/don_hang/v_don_hang.php";
            include ("template/front_end/layout.php");
        }
    }
}

?>