<?php
include_once "../classes/Database.class.php";
include_once "../classes/Activity.class.php";
include_once "../classes/Session.class.php";
Session::startSession();
$conn=(new Database())->getConnection();
$act=new Activity($conn);
$results=$act->getActivitiesForProgramme($_SESSION['user_id']);


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Show Activity</title>
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
    <link rel="manifest" href="manifest.json">
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
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


    <!-- header goes here -->
    <?php
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
                Activities
                <small>Mentor panel</small>
            </h1>
        
        </section>






        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Hover Data Table</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <a href="addActivity.php" class="btn btn-primary">+ Add Activity</a>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Sr</th>
                                    <th>Activity</th>
                                    <th>Activity Conducted on</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $cnt=0;
                                foreach($results as $result){
                                    extract($result);
                                $cnt++;
                                ?>
                                <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td><a href="editActivity.php?id=<?php echo $activity_id ?>"><?php echo $name ?></a>
                                    </td>
                                    <td><?php echo $created_on?></td>
                                    <td><a href="editActivity.php?id=<?php echo $activity_id ?>">Edit</td>
                                    <td><a href="deleteActivity.php?id=<?php echo $activity_id ?>">Delete</td>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- BODY GOES HERE -->

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




















