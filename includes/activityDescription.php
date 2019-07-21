<?php
include_once "../classes/Database.class.php";
include_once "../classes/Crud.class.php";
include_once "../classes/Session.class.php";
$conn=(new Database())->getConnection();

if(isset($_POST['addActivity'])){
    extract($_POST);

}