<?php
include_once "../classes/Session.class.php";
Session::startSession();
echo $_SESSION['user_id'];
echo $_SESSION['user_name'];
echo $_SESSION['user_role_type'];