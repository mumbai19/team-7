<?php

include_once "Session.class.php";

class Authentication{

    private $table="users";


    public function loginUser($conn,$email){
        $sql = "SELECT * FROM {$this->table} WHERE user_name='$email' ";
        // echo $sql;
        $statement = $conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    public function logout(){
        if(Session::unsetSession()){
            Session::deleteCookies();
            return true;
        }
        return false;

    }
}