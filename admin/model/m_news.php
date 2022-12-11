<?php
require_once("database.php");
class m_news extends database{
    public function read_news(){
        $sql = "select * from news";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function read_news_by_id_news($id){
        $sql = "select * from news where id = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    public function read_category(){
        $sql = "select * from category";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function add_news($name,$image,$note,$idcategory){
        $sql = "insert into news(name,image,note,idcategory) values(?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute(array($name,$image,$note,$idcategory));
    }
    public function edit_news($id,$name,$image,$note,$idcategory){
        $sql = "update news set name=?,image=?,note=?,idcategory=? where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($name,$image,$note,$idcategory,$id));
    }
    public function delete_news($id){
        $sql = "delete from news where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }
}
?>