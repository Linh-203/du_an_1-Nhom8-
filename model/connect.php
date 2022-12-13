<?php
    function connect($query){
        $connection = new PDO("mysql:host=localhost;dbname=du_an_1-nhom8-;charset=utf8","root","");
        $stmt = $connection -> prepare($query);
        $stmt -> execute();
        return $stmt;
    }

    
    function getAll($query){
        $result = connect($query) -> fetchAll(); 
        return $result; 
    }

   
    function getOne($query){
        $result = connect($query) -> fetch(); 
        return $result;  
    }
?>