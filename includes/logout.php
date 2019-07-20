<?php
include_once('../classes/Authentication.class.php');

$obj=new Authentication();
$obj->logout();
header("Location: login.php")
?>