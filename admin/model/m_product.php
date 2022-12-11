<?php
require_once("database.php");
class m_product extends database{
    public function read_product(){
        $sql = "select * from products";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function read_product_by_id_product($id){
        $sql = "select * from products where id = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    public function insert_product($productName,$productImage,$productPrice,$productDesc,$date, $quantity,$categoryId,$color_red,$color_white,$color_black,$color_green){
        $sql = "insert into products(productName,productImage,productPrice,productDesc,date, quantity,categoryId,color_red,color_white,color_black,color_green) values (?,?,?,?,?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute(array($productName,$productImage,$productPrice,$productDesc,$date, $quantity,$categoryId,$color_red,$color_white,$color_black,$color_green));
    }
    public function read_category(){
        $sql = "select * from category";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function edit_product($id,$productName,$productImage,$productPrice,$productDesc,$date, $quantity,$categoryId,$selling,$color_red,$color_white,$color_black,$color_green){
        $sql = "update products set productName = ?, productImage = ?,productPrice = ?,productDesc = ?,date = ? ,quantity = ?, categoryId =?,  selling=?, color_red = ?, color_white=?, color_black=?, color_green = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($productName,$productImage,$productPrice,$productDesc,$date, $quantity,$categoryId,$selling,$color_red,$color_white,$color_black,$color_green,$id));
    }
    public function delete_product($id){
        $sql = "delete from products where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }
}
?>