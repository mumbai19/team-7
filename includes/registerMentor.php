
<?php
include_once "../classes/Database.class.php";
include_once "../classes/Crud.class.php";
include_once "../classes/Session.class.php";
Session::startSession();
$db=(new Database())->getConnection();
$crud=new Crud($db);
if(isset($_POST['addMentor'])){
    
    $condition="user_email='xyzz@gmail.com' ";
    extract($_POST);
    $data=array(
      'user_first_name' => $mentorFname,
      'user_last_name' => $mentorLname,
      'user_gender' => $mentorGender,
      'user_phone' => $mentorPhone,
      'created_by' =>1,
      'is_deleted' => 0,        
      'user_role_id' => 2,
    );

    $crud->update($db,'users',$data,$condition);
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


<h1>Register mentor</h1>

<form action="" method="post" enctype="multipart/form-data">
First Name: <input type="text" name="mentorFname"> <br>
Last Name: <input type="text" name="mentorLname"> <br>
Gender:
<input type="radio" name="mentorGender" value="Male"> Male 
<input type="radio" name="mentorGender" value="Female"> Female<br>
Phone: <input type="phone" name="mentorPhone"> <br>

<input type="submit" name="addMentor" value="Add Mentor"> 
</form>

</body>
</html>

