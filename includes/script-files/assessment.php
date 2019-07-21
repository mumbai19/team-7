<?php

include_once("../../classes/Database.class.php");
include_once("../../classes/Attendance.class.php");
include_once("../../classes/Theme.class.php");
include_once("../../classes/Mentor.class.php");



$ob = new Database();
$conn = $ob->getConnection();

$obj = new Mentor($conn);



if(isset($_POST['parameter'])){
    // echo "hello";
    // echo $_POST['user'];
    $mentor_id = $obj->getMentor($_POST['user']);
    // extract($mentor_id);
    // print_r($mentor_id);
    
    $mentor = $mentor_id['mentor_id'];
    // echo $mentor;
    $program = $obj->getProgramForMentor($conn,$mentor);
    // print_r($program);

    $data = array("theme_id"=>$_POST['theme'],"mentor_id"=>$_POST['user'],"student_id"=>$_POST['stud'],"parameter_id"=>$_POST['par'],"programme_id"=>$program['prog_id']);


    $obj = new Theme();
    $obj->insertAssessment($conn,$data);
}

?>