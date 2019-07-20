<?php
include_once "../../classes/Database.class.php";
include_once "../../classes/Crud.class.php";
$db=(new Database())->getConnection();

class Admin
{
    private  $conn;
    public  function __construct($conn)
    {
        $this->conn=$conn;
    }

}