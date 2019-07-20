<?php
include_once "Session.class.php";
class User{

    public function getUserWithCondition($condn,$key){
        global $database;
        $res=$database->query("select * from users where $condn=$key");
        return $res;
    }
}
?>