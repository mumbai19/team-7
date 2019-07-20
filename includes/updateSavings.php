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
          width=50% ;
          margin : 20px;
          margin-left: 30%;
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
  echo '<form role="form" action="" method="post" enctype="multipart/form-data">';
  extract($_POST);
  echo "<table> <tr> <th> First Name </th>  <th> SavingsToday </th> </tr>";
  $condition=" student_id in (select student_id from student_programme where student_programme.programme_id=(select programme_id from programme where programme_name='$programme')) ";
  $result= $crud->readall($db,'student',$condition);
  foreach($result as $res){
      echo '<tr> <td>'.$res['student_first_name'].' '.$res['student_last_name'].'</td> <td>';
      echo "<input type='number' name='student_id[".$res['student_id']."]' value=".$res['student_id']." hidden> <input type=number name='saving'> </td> </tr>";
      //echo "<input type=number name='stud_id[".$res['student_id']."]'> </td> </tr>";
     
    }
    
  echo '</table>'; 
  echo "<input type='submit' class='btn btn-primary' name='insertSavings' value='Submit Savings'> </form>";
}





if(isset($_POST['insertSavings'])){
  echo $StudArr=$_POST['student_id'];
  //$value=$StudArr['student'];
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
