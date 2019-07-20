<?php

class Database{
    private $host="localhost";
    private  $db="cfg";
    private  $username="Dhiren Chotwani";
    private $password="Activa9015";
    private $conn=null;

    public function __construct()
    {
        try{
            $this->conn=new PDO("mysql:host={$this->host};dbname={$this->db}" , $this->username, $this->password);
        }catch(PDOException $e){
            die("Issue:" . $e->getMessage());
        }
    }

    public function getConnection(){
        return $this->conn;
    }
}