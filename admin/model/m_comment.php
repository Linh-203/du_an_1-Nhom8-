<?php 
require_once("database.php");
class m_comment extends database{
    public function read_comment(){
        $sql = "select * from comment";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function read_detail_comment(){
        $sql = "SELECT * FROM comment JOIN products ON comment.id_product=products.id
        JOIN users ON comment.id_user = users.id ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function delete_comment($id){
        $sql = "delete from comment where id = ? ";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }
}
?>