<?php
include_once "../classes/Database.class.php";
include_once "../classes/Crud.class.php";
include_once "../classes/Session.class.php";
Session::startSession();
$db=(new Database())->getConnection();
$crud=new Crud($db);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Savings</title>
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css"/>
  <!-- Tell the browser to be responsive to screen width -->
    <meta
      content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
      name="viewport"
    />
    <!-- Bootstrap 3.3.7 -->
    <link
      rel="stylesheet"
      href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css"
    />
<!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css" />
    <!-- Morris chart -->
    <link rel="stylesheet" href="../assets/bower_components/morris.js/morris.css" />
    <style type="text/css">
      td,td{
        border: 1px solid black;
        padding: 10px;
      }
      table{
        padding: 10px;
        border:1px solid black;
        margin : 20px 20%;
        width:30% ;

      }
    </style>
</head>
<body>


<form action="" method="post" enctype="multipart/form-data">
Choose Programme: 
<select name="programme"> 
<?php
  
    $condition=1;
    $result = $crud->readall($db,'programme',$condition);
    foreach($result as $res){
      echo "<option>".$res['programme_name']."</option>";
    }
?>
</select> <br>
<input type="submit" class="btn btn-primary" name="searchStudents" value="Get Programme Students">
</form>


<?php

if(isset($_POST['searchStudents'])){
 
  extract($_POST);
  echo "<table> <tr> <th> First Name </th>  <th> Savings Today </th> </tr>";
  $condition=" student_id in (select student_id from student_programme where student_programme.programme_id=(select programme_id from programme where programme_name='$programme')) ";
  $result= $crud->readall($db,'student',$condition);
   echo '<form  action="updateSavings.php" method="post" ';
  foreach($result as $res){
      echo '<tr> <td>'.$res['student_first_name'].' '.$res['student_last_name'].'</td> <td>';
      echo "<input type='number' name='".$res['student_id']."'> </td> </tr>";
      //echo "<input type=number name='stud_id[".$res['student_id']."]'> </td> </tr>";
     
    }
    
  echo '</table>'; 
  echo "<input type='submit' class='btn btn-primary' name='insertSavings' value='Submit Savings'> </form>";
}


if(isset($_POST['insertSavings'])){
      $result= $crud->readall($db,'student',$condition);

      foreach($result as $res){
      //echo $result['student_id'];
        $id = $res['student_id'];
        $saving =  $_POST[$id];
        $data=array(
        'student_id' => $id,
        'user_id' => 1,
        'amount' => $saving,
        
        'created_by' =>1,
        'is_deleted' => 0,
        

    );
    $crud->create($db,'savings',$data);

      
        
    }
}
?>

</body>
</html>
<!-- 
<table style="border: 1px solid black">
  <tr>
    <th>Hey</th>
    <th>Hey</th>
  </tr>
  <tr>
    <td>HI</td>
    <td>Hey</td>
  </tr> 
  <tr>
    <td>HI</td>
    <td>Hey</td>
  </tr> 
</table> -->
