<?php 
require_once("database.php");
class m_voucher extends database{
    public function read_voucher(){
        $sql = "select * from vocher";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function read_voucher_by_code($id){
        $sql = "select * from vocher where code like ? ";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    public function read_voucher_by_id_voucher($id){
        $sql = "select * from vocher where code = ? ";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    public function add_voucher($code,$price,$turn,$date_out,$img,$status,$condition){
        $sql = "insert into vocher(code, sale, quantity, out_of_date,status,img,condition_V) values(?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute(array($code,$price,$turn,$date_out,$status,$img,$condition));
    }
    public function update_voucher($code,$sale,$quantity,$img,$status,$date_out,$condition,$id){
        $sql = "update vocher set code = ?, sale = ?, quantity = ?,img = ?,status = ?,out_of_date = ?, condition_V = ? where code = ? ";
        $this->setQuery($sql);
        return $this->execute(array($code,$sale,$quantity,$img,$status,$date_out,$condition,$id));
    }
    public function delete_voucher($id){
        $sql = "delete from vocher where code = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }

}
?>