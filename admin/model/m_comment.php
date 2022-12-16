<?php 
require_once("database.php");
class m_comment extends database{
    public function read_comment(){
        $sql = "select * from comment";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function read_detail_comment(){
        $sql = "SELECT  users.username, users.id,comment.id_product,comment.date_cmt,content,avatar,comment.id as id_cmt , productName FROM comment
        JOIN products ON comment.id_product=products.id
                JOIN users ON comment.id_user = users.id; ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function delete_comment($id){
        $sql = "delete from comment where id = ? ";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }
    public function detail_comment($id){
        $sql = "select * from oder where id = ?";
        $this->setQuery($sql); 
        return $this->loadRow(array($id));
    }
}
?>