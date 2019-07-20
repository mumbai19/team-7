<?php


class Graph
{
    private $conn;
public function __construct($db)
{
    $this->conn=$db;
}

public function studentMonthlyAttendance(){

    $sql = "SELECT month,count(*) as cnt FROM `attendance` group by month";
    // echo $sql;
    $statement = $this->conn->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
}