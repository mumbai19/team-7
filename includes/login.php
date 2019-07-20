<?php
include_once "../classes/Database.class.php";
include_once "../classes/Session.class.php";
Session::startSession();
$db=new Database();
$conn=$db->getConnection();
include_once "../classes/Crud.class.php";
$crud=new Crud($conn);
if(isset($_POST['login'])) {
    extract($_POST);
    $signed_in_val=0;
    if($signed_in){
        $signed_in_val=1;
    }

    $data = $crud->getUserEmail($user_email);
    if ($data[0]['user_password'] === $_POST['password']) {
        $values = array(
            'user_id' => $data[0]['user_id'],
            'user_name' => $data[0]['user_first_name'] . " " . $data[0]['user_last_name'],
            'user_role_type' => $data[0]['user_role_id'],
        );
        Session::setSession($values);
        Session::setCookies($signed_in_val);
        header("Location: dashboard.php");

    }
}
?>

<html>
<head></head>
<body>
<form action="" method="post" enctype="multipart/form-data">
<label for="">email:<input type="text" name="user_email"></label><label for="">Password:<input type="text" name="password"></label>
    Remember Me:<input type="checkbox" name="signed_in">
    <input type="submit" name="login">
</form>
</body>
</html>
