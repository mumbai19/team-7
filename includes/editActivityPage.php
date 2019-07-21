<?php
include_once "../classes/Database.class.php";
include_once "../classes/Activity.class.php";
include_once "../classes/Session.class.php";
include_once ("../classes/Theme.class.php");

$conn = new Database();
$db = $conn->getConnection();

$obj = new Activity($db);



if(isset($_POST['changePass'])){
    echo $_POST['theme'];
    // echo $_POST['activity_name'];
    // echo $_POST['description'];

    $data = array("activity_id"=>$_POST['activity'],"name"=>$_POST['activity_name'],"theme_id"=>1,"description"=>$_POST['description']);

    $obj->insertActivity($data);

}

?>