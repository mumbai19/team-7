<?php

session_start();
if(!isset($_SESSION['user_id'])){
    die("failed");
}
include_once("../classes/Database.class.php");
include_once("../classes/Attendance.class.php");

$ob = new Database();
$conn = $ob->getConnection();

$obj = new Attendance();

$results = $obj->getAllStudents($conn,$_SESSION['user_id']);

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Attendance</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta
            content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
            name="viewport"
    />
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
    <link rel="manifest" href="../manifest.json">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


    <!-- header goes here -->
    <?php
    $name = $_SESSION['user_name'];
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
                Attendance
                <small>Mentor panel</small>
            </h1>

        </section>


        <!-- BODY GOES HERE -->
        <form action="script-files/insertAttendance.php" method="post">


            <table class="table table-striped">
                <tr>
                    <td>Sr</td>
                    <td>Student_name</td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                $cnt=0;
                foreach($results as $result){
                       $cnt++;
                    ?>

                    <tr>
                        <td><?php echo $cnt;?></td>
                    <td><?php echo $result['student_first_name']." ".$result['student_last_name'] ?></td>
                    <td><input type="radio" name="<?php echo $result['student_id'] ?>" value="present"> Present</td>
                    <td><input type="radio" name="<?php echo $result['student_id'] ?>" value="absent"> Absent <br></td>

                </tr>
                <?php
            }
            ?>
            </table>
            <!-- <input type="radio" name="gender" value="male"> Male<br>
            <input type="radio" name="gender" value="female"> Female<br> -->
            <input type="hidden" name="user" value=<?php echo $_SESSION['user_id'] ?>>
            <div class="text-center">
            <button type="submit" name="attendance" class="btn btn-primary">Submit</button>

            </div>

        </form>
        <!-- BODY ENDS HERE -->


    </div>
    <!-- /.content-wrapper -->


    <!-- Footer start -->

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
