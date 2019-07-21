<?php
include_once "../classes/Database.class.php";
include_once "../classes/Activity.class.php";
include_once "../classes/Session.class.php";
include_once ("../classes/Theme.class.php");
Session::startSession();
$conn=(new Database())->getConnection();
$conn1 = new Database();
$cn = $conn1->getConnection();
$crud=new Crud($conn);

$theme = new Theme();

$result=$crud->readAll($conn,"theme",1);
$themess=[];
foreach($result as $res)
{
  extract($res);
  array_push($themess,$theme_name);
}

$res="";
$id="";
if(isset($_GET['id'])){
    $activity_id = $_GET['id'];
    $obj = new Activity($conn);
    $res = $obj->getDetail($activity_id);
    $id =  $res['theme_id'];

    $name = $theme->getTheme($cn,$id);
    // print_r($name);
    // echo $res['name'];
    // print_r($res);
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

      <!-- side bar ends -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Activity
            <small>Control panel</small>
          </h1>
          
        </section>
        <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Activity</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="editActivityPage.php" method="post" enctype="multipart/form-data">
              <div class="box-body">

            <input type="hidden" name=activity value=<?php echo $_GET['id'] ?> >
               
                <div class="form-group">
                  <label>Theme</label>
                  <select id="theme" name="theme" class="form-control select2" style="width: 100%;">
                  <?php
                  echo '<option value='.$id.'>'.$res['name'].'</option>';
                  ?>

                  <?php
                //   foreach($result as $res){
                //       echo "<option value=".$res['activity_id'].'>'.$res['activity_name'].'</option>';
                //   }
                  ?>
                
                </select>
                   </div>
                <div class="form-group">
                  <label>Activity Name</label>
                  <input type="text" class="form-control" name="activity_name" value="<?php echo $name['theme_name']?>">
                </div>

                <div class="form-group">
                  <label>Description</label>
                  <input type="text" class="form-control" name="description" value="<?php echo $res['description'] ?>">
                </div>
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer text-center">
                <input type="submit" class="btn btn-primary" name="changePass" value="Edit Activity"> 
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
