<?php

include_once("../../classes/Database.class.php");
include_once("../../classes/Attendance.class.php");

$ob = new Database();
$conn = $ob->getConnection();

$obj = new Attendance();

$results = $obj->getAllStudents($conn,$_POST['user']);

if(isset($_POST['attendance'])){
    
    foreach($results as $result){
        echo $result['student_id'];
        $name = $result['student_id'];
        $mark =  $_POST[$name];
        // $program=2;
        $obj2 = new Mentor($conn);
        $program = $obj2->getProgramForMentor($conn,$_POST['user']);
        

        $mentor  = $obj2->getMentor($_POST['user']);

        $obj->insertAttendance($conn,$mark,$result['student_id'],$program['prog_id'],$mentor['mentor_id']);
        
    }

    //     $var = $_POST['1'];



    // $ans =  $_POST['gender'];
    // echo $ans;
}

?>