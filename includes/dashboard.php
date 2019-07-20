<?php
include_once "../classes/Session.class.php";
include_once "../classes/Authentication.class.php";
Session::startSession();
echo $_SESSION['user_id'];
echo $_SESSION['user_name'];
echo $_SESSION['user_role_type'];

if($_SESSION['user_role_type'] == 2 ){
    header("Location: mentorDashboard.php");
}
//if(isset($_POST['logout'])){
//Authentication::logout();
//header("Location: login.php");
//}
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="submit" value="logout" name="logout">
</form>
