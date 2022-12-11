<?php 
    include "connect.php";
    class m_product{
        public function category(){
   $query =  "SELECT * FROM category";
   $array = getAll($query);
   return $array;
        }
//         public function product(){
//    $query = "SELECT * FROM products";
//    $array = getAll($query);
//    return $array;
//         }
        public function product_new(){
   $query = "SELECT * , date FROM products ORDER BY products.date DESC LIMIT 12";
   $array = getAll($query);
   return $array;
        }
        public function product_selling(){
   $query = "SELECT * FROM products where selling =1";
   $array = getAll($query);
   return $array;
        }

        }
    

?>