
<?php
include_once "../classes/Database.class.php";
include_once "../classes/Crud.class.php";
include_once "../classes/Session.class.php";
Session::startSession();
$db=(new Database())->getConnection();
$crud=new Crud($db);
if(isset($_POST['addMentor'])){
    extract($_POST);
    $data=array(
      'user_email' => $userEmail,
      'created_by' =>1,
      'is_deleted' => 0,        
      'user_role_id' => 2,
    );

    $crud->create($db,'users',$data);
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


<h1>Add mentor</h1>

<form action="" method="post" enctype="multipart/form-data">

Email: <input type="email" name="userEmail"> <br>

<input type="submit" name="addMentor" value="Add Mentor"> 
</form>

</body>
</html>

