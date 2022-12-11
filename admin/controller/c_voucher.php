<?php
class c_voucher {
    public function show_voucher(){
        $view = "view/voucher/v_voucher.php";
        include ("template/front_end/layout.php");
    }
    public function add_voucher(){
        $view = "view/voucher/v_add_voucher.php";
        include ("template/front_end/layout.php");
    }
}

?>