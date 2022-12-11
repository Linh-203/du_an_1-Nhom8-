<?php
require_once ("model/database.php");
class m_user extends database {
    
    public function read_user(){
        $sql = "select * from users";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function read_user_by_id_user($id){
        $sql = "select * from users where id = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }

    public function add_user($id,$username,$email,$pass,$avatar,$role,$phone,$status){
        $sql = "insert into users(id,username,email,pass,avatar,role,phone,status) values(?,?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute(array($id,$username,$email,$pass,$avatar,$role,$phone,$status));
    }

    public function edit_user($id,$username,$email,$pass,$avatar,$role,$phone,$status){
        $sql = "update users set username = ?, email = ?, pass = ?, avatar = ?, role = ?, phone = ?, status = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($username,$email,$pass,$avatar,$role,$phone,$status,$id));
    }

    public function delete_user($id){
        $sql = "delete from users where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }

}
?>