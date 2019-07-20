<?php
include_once "../classes/Database.class.php";
$conn=(new Database())->getConnection();
include_once "./classes/AdminCrud.class.php";
$crude=new AdminCrud($conn);

if(isset($_POST['addMentor'])){
    extract($_POST);
    $data=array(
        'user_email'=>$mentor_email,
        'user_role_id' => 2,
    );
    $id=$crude->create($conn,'users',$data);
    $data=array(
            'user_id'=>$id,
            'prog_id'=>$prog_id,
        'batch' => $batch
    );
    $crude->create($conn,'mentor',$data);
    $crude->sendMentorMail($mentor_email);
}
?>

<form action="" method="post" >
    <input type="text" name="mentor_email">
    <input type="text" name="prog_id">
    <input type="text" name="batch">
    <input type="submit" name="addMentor">
</form>
