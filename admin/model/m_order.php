<?php
require_once("database.php");
class m_order extends database {
    public function read_order(){
        $sql = "select * from oder";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function read_order_by_id_order($id){
        $sql = "select * from oder where id = ?";
        $this->setQuery($sql); 
        return $this->loadRow(array($id));
    }
    public function read_detail_order($id){
        $sql = "SELECT *, oder_detail.quantity AS quantity_oder FROM oder_detail JOIN products ON oder_detail.id_product=products.id 
        JOIN oder ON oder_detail.id_order = oder.id where id_order= ?";
        $this->setQuery($sql); 
        return $this->loadAllRows(array($id));   
    }
    public function update_order($id,$status,$received_date,$pay){
        $sql = "update oder set status = ?, received_date = ?, pay = ? where id = ? ";
        $this->setQuery($sql);
        return $this->execute(array($status,$received_date,$pay,$id));
    }
}
?>