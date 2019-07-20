<?php

include_once("../../classes/Database.class.php");
include_once("../../classes/Attendance.class.php");
include_once("../../classes/Theme.class.php");
include_once("../../classes/Mentor.class.php");



$ob = new Database();
$conn = $ob->getConnection();

$obj = new Mentor($conn);



if(isset($_POST['parameter'])){
    $mentor_id = $obj->getMentor($_POST['user']);
    $program = $obj->getProgramForMentor($conn,$mentor_id);
    
    $data = array("theme_id"=>$_POST['theme'],"mentor_id"=>$_POST['user'],"student_id"=>$_POST['stud'],"parameter_id"=>$_POST['par'],"programme_id"=>$program);


    $obj = new Theme();
    $obj->insertAssessment($conn,$data);
}

?>