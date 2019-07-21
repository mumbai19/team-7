<?php

session_start();
if(!isset($_SESSION['user_id'])){
    die("failed");
}
include_once("../classes/Database.class.php");
include_once("../classes/Attendance.class.php");
include_once("../classes/Theme.class.php");


$ob = new Database();
$conn = $ob->getConnection();
$obj = new Theme();
$results = $obj->getAllThemes($conn);
$obj3 = new Attendance();

$students = $obj3->getAllStudents($conn,$_SESSION['user_id']);

// print_r($results);

$ids = array();
$names = array();

$idsp = array();
$namesp = array();

foreach($results as $res){
  extract($res);
  array_push($ids,$theme_id);
}
// print_r($ids);

foreach($results as $res){
  extract($res);
  array_push($names,$theme_name);
}
// print_r($names);

$parameters = $obj->getParametersForProgram($conn);

foreach($parameters as $per){
  extract($per);
  array_push($idsp,$parameter_id);
}

foreach($parameters as $per){
  extract($per);
  array_push($namesp,$parameter_name);
}



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>AdminLTE 2 | Dashboard</title>
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
    
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="../assets/bower_components/font-awesome/css/font-awesome.min.css"
    />
    <!-- Ionicons -->
    <link
      rel="stylesheet"
      href="../assets/bower_components/Ionicons/css/ionicons.min.css"
    />
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css" />
    <!-- Morris chart -->
    <link rel="stylesheet" href="../assets/bower_components/morris.js/morris.css" />
    <!-- jvectormap -->
    <link
      rel="stylesheet"
      href="../assets/bower_components/jvectormap/jquery-jvectormap.css"
    />
    <!-- Date Picker -->
    <link
      rel="stylesheet"
      href="../assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"
    />
    <!-- Daterange picker -->
    <link
      rel="stylesheet"
      href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.css"
    />
    <!-- bootstrap wysihtml5 - text editor -->
    <link
      rel="stylesheet"
      href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"
    />


    <script type='text/javascript'>

   
document.addEventListener("DOMContentLoaded", function() {
  loadOptions();
});

      function loadOptions()
      {
      
        //Retrieve theme arr from database
        // arr=[11,22,33,44,55];
        var data1 =<?php echo json_encode($ids);?>;
        var data2 = <?php echo json_encode($names);?>;

        for(var i=0;i<data1.length;i++)
        {
          
          var option = document.createElement("option");
          option.text = data2[i];
          option.value = data1[i];
          var select = document.getElementById("theme");
            select.appendChild(option);
        }


        //Retrieve Parameter arr from database

        arr1=["Good","Very Good","Excellent"];
        var data1 =<?php echo json_encode($idsp);?>;
        var data2 = <?php echo json_encode($namesp);?>; 

        for(var i=0;i<data1.length;i++)
        {
          var option = document.createElement("option");
          option.text = data2[i];
          option.value = data1[i];
          var select = document.getElementById("parameter_dropdown");
            select.appendChild(option);
        }
      }



      function append_parameter()
      {
        var option = document.createElement("option");
          option.text = document.getElementById("parameter").value;
          option.value = document.getElementById("parameter").value;

          var select = document.getElementById("parameter_dropdown");
            select.appendChild(option);
            
          var d = document.getElementById("parameter_fields");  
          document.getElementById("parameter").value = "";    }

    var count=0;
        function addFields(){
            // Number of inputs to create
            // Container <div> where dynamic content will be placed
            var container = document.getElementById("container");
            // Clear previous contents of the container
          
                // Append a node with a random text
              //  container.appendChild(document.createTextNode("Member"));
                // Create an <input> element, set its type and name attributes
                
                
                var input = document.createElement("input");
                input.type = "text";
                input.name = "member";
                input.id="parameter";
                input.placeholder="parameter "+(count+1);
                input.className="form-control";
                container.appendChild(input);
                input = document.createElement("button");
                input.type = "button";
                input.text = "Add";
                input.id="single_add_button";
               
                input.className="btn btn-primary";
                container.appendChild(input);
                
                // Append a line break 
                container.appendChild(document.createElement("br"));
            count++;
        }
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"
    />



  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      

        <!-- header goes here -->
        <?php
        $name = $_SESSION['user_id'];
        include_once ("../includes/templates/header.php");
        ?>
        <!-- header ends -->


      <!-- Left side column. contains the logo and sidebar -->
      <!-- side bar goes ehre -->
      <?php
      include_once ("../includes/templates/navbar.php");
      ?>
      <!-- side bar ends -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li>
              <a href="#"><i class="fa fa-dashboard"></i> Home</a>
            </li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
        <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="script-files/assessment.php" method="post" role="form">
              <div class="box-body">
             
              <div class="form-group">
                  <label for="text">Theme</label>
                
                <select id="theme" name="theme" class="form-control select2" style="width: 100%;">
                
                </select>
            
                </div>


                <div class="form-group">
                  <label for="text">Description</label>
                  <input type="textarea" class="form-control" id="theme" name="des" >
                </div>
             
             
               
             
                <div class="form-group">
                  <label for="text">Parameter</label>
                  <select id="parameter_dropdown" name="par" class="form-control select2" style="width: 100%;">
                
                </select>
                </div>

                <div class="form-group">
                  <label for="text">Student</label>
                  <select  name="stud" class="form-control select2" style="width: 100%;">
                  <?php
                  foreach($students as $student){
                    echo "<option value=".$student['student_id'].">".$student['student_first_name']." ".$student['student_last_name']."</option>";
                  }
                  ?>
                
                </select>
                </div>
                <?php echo $_SESSION['user_id']; ?>
                <input type="hidden" name="user" value=<?php echo $_SESSION['user_id'] ?>>
             
             
                
                
              </div>
            
              <!-- /.box-body -->

              <div class="box-footer">
              <!--  <button type="button" class="btn btn-primary" onclick="addFields()">Add More</button>-->
                <button type="submit" name="parameter" class="btn btn-primary">Submit
              </div>
            </form>
          </div>
    
        </div>
        </div>
        </section>

  </div>
  <!-- /.form-box -->
</div>


        <!-- BODY ENDS HERE -->


      </div>
      <!-- /.content-wrapper -->
      

        <!-- Footer start -->
        <?php
        include_once("../includes/templates/footer.php");
        ?>
        <!-- Footer end -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <!-- Bootstrap 3.3.7 -->
    <script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="../assets/bower_components/raphael/raphael.min.js"></script>
    <script src="../assets/bower_components/morris.js/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="../assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../assets/bower_components/moment/min/moment.min.js"></script>
    <script src="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../assets/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/dist/js/demo.js"></script>
  </body>
</html>
