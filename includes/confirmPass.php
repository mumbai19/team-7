
<?php
include_once "../classes/Database.class.php";
include_once "../classes/Crud.class.php";
include_once "../classes/Session.class.php";
Session::startSession();
$db=(new Database())->getConnection();
$crud=new Crud($db);
$condition="user_email='xyzz@gmail.com' ";
if(isset($_POST['addMentor'])){
    extract($_POST);
    if(strcmp($pass1,$pass2)==0){
      $data=array(
        'user_password' => $pass1,
      );
      
      $crud->update($db,'users',$data,$condition);
    }
}    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Touching lives</title>
        <!-- JQuery -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js" ></script> 
</head>
<body>


<h1>Confirm Password</h1>

<form action="" method="post" enctype="multipart/form-data">
Enter New password: <input type="password" name="pass1"> <br>
Confirm Password: <input type="password" name="pass2"> <br>
<input type="submit" name="addMentor" value="Add Mentor"> 
</form>

</body>
</html>

