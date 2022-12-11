<?php 
require_once("database.php");
class m_category extends database{
    public function inser_category($categoryName,$date,$image,$banner){
        $sql = "insert into category(categoryName,date,image,banner) values(?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute(array($categoryName,$date,$image,$banner));
    }
    public function read_category(){
        $sql = "select * from category";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function read_category_by_id_category($id){
        $sql = "select * from category where id = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }

    public function edit_category($id,$categoryName,$date,$image,$banner){
        $sql = "update category set categoryName = ?, date = ?,image = ?,banner = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($categoryName,$date,$image,$banner,$id));
    }
    public function delete_category($id){
        $sql = "delete from category where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }
}
?>