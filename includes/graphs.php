<?php
include_once "../classes/Graph.class.php";
include_once "../classes/Database.class.php";
$db=(new Database())->getConnection();
$graph=new Graph($db);
$results=$graph->studentMonthlyAttendance();
$labels=array();
$data=array();
foreach ($results as $result){
    extract($result);
    array_push($labels,$month);
    array_push($data,$cnt);
}
print_r($labels);
print_r($data);
