<?php
include_once "../classes/Database.class.php";
include_once "../classes/Crud.class.php";
include_once "../classes/Session.class.php";
Session::startSession();
$db=(new Database())->getConnection();
$crud=new Crud();
if(isset($_POST['addStudent'])){
    extract($_POST);
    $data=array(
      'student_first_name' => $student_first_name,
      'student_last_name' => $student_last_name,
      'student_gender' => $student_gender,
      'student_school' => $student_school,
      'student_batch' => $student_batch,
        'created_by' => $_SESSION['user_id'],
        'is_deleted' => 0,
    );

    $crud->create($db,'student',$data);
}
?>
<html>
<head>

</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <label for="">Student First Name:<input type="text" name="student_first_name"></label>
    <label for="">Student Last Name:<input type="text" name="student_last_name"></label>
    <label for="">Student School:<input type="text" name="student_school"></label>
    <label for="">Student Gender:
        <select name="student_gender" id="">
            <option value="MALE">MALE</option>
            <option value="FEMALE">FEMALE</option>
            <option value="OTHER">OTHER</option>
        </select>
    </label>
    <label for="">Student Batch:
        <select name="student_batch" id="">
            <option value="ONE">ONE</option>
            <option value="TWO">TWO</option>

        </select>
    </label>
    <input type="submit" name="addStudent">
</form>
</body>
</html>
