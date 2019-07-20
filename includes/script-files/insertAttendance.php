<?php

include_once("../../classes/Database.class.php");
include_once("../../classes/Attendance.class.php");

$ob = new Database();
$conn = $ob->getConnection();

$obj = new Attendance();

$results = $obj->getAllStudents($conn);

if(isset($_POST['attendance'])){
    
    foreach($results as $result){
        echo $result['student_id'];
        $name = $result['student_id'];
        $mark =  $_POST[$name];
        $program=2;
        $obj->insertAttendance($conn,$mark,$result['student_id'],$program,$result['mentor_id']);
        
    }

    //     $var = $_POST['1'];



    // $ans =  $_POST['gender'];
    // echo $ans;
}

?>