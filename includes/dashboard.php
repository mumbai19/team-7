<?php
include_once "../classes/Session.class.php";
include_once "../classes/Authentication.class.php";
include_once "../classes/Crud.class.php";
include_once "../classes/Database.class.php";
$db=(new Database())->getConnection();
$crud=new Crud($db);
Session::startSession();
echo $_SESSION['user_id'];
echo $_SESSION['user_name'];
echo $_SESSION['user_role_type'];

if($_SESSION['user_role_type'] == 2 ){
    if($crud->getIsFirstLogin($_SESSION['user_id'])==0){
        header("Location: registerMentor.php");
    }else {
        header("Location: mentorDashboard.php");
    }
}
if($_SESSION['user_role_type'] == 1 ){
    header("Location: ../admin/adminDashboard.php");
}
//if(isset($_POST['logout'])){
//Authentication::logout();
//header("Location: login.php");
//}
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="submit" value="logout" name="logout">
</form>
