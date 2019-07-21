<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<?php
include_once "../classes/Graph.class.php";
include_once "../classes/Database.class.php";
$db=(new Database())->getConnection();
$graph=new Graph($db);
$results=$graph->studentMonthlySavings();
$labels=array();
$data=array();
foreach ($results as $result){
    extract($result);
    array_push($labels,$student_id);
    array_push($data,$total);
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Chart.js demo</title>
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
        <!-- import plugin script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

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
            Dashboard
            <small>Monthly Savings</small>
          </h1>
          <ol class="breadcrumb">
            <li>
              <a href="#"><i class="fa fa-dashboard"></i> Home</a>
            </li>
            <li class="active">Dashboard</li>
          </ol>
        </section>


        <!-- BODY GOES HERE -->
       <!-- line chart canvas element -->
<div>
        <select id="selChart">
          <option value="">Select</option>
      <option value="bar">Bar</option>
      <option value="line">Line</option>
      <option value="pie">Pie</option>
     </select>
     <!--
     <select id="selMonth">
          <option value="">Select</option>
          <option value="All">All</option>
      <option value="Jan">Jan</option>
      <option value="Feb">Line</option>
      <option value="Mar">Pie</option>
     </select>
     <select id="selYear">
          <option value="">Select</option>
          <option value="All">2018</option>
      <option value="Jan">2019</option>
      <option value="Feb">2020</option>
      <option value="Mar">2021</option>
     </select>
      <select id="selYear">
          <option value="">Select</option>
          
     </select>-->
<section class="content">
      <div class="row">
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Monthly Savings of Multiple Students</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart" id="chartContainer">
                <canvas id="myChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- DONUT CHART -->
          <div class="box box-danger" style="display: none">
            <div class="box-header with-border" >
              <h3 class="box-title">Donut Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body" id="chartContainer3">
              <canvas id="myChart3" style="height:250px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Yearly Savings of A Single Student</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart" id="chartContainer2">
                <canvas id="myChart2" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- BAR CHART -->
          <div class="box box-success" style="display: none">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart" id="chartContainer3">
                <canvas id="myChart3" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->

    </section>
</div>
       <!-- <div id="chartContainer" width="50px" height="50px">
        <canvas id="myChart" ></canvas>
       </div>
       <div id="chartContainer2" width="50px" height="50px" style="border:solid;">
        <canvas id="myChart2" ></canvas>
       </div>
        <div id="chartContainer3" width="50px" height="50px">
        <canvas id="myChart3" ></canvas>
       </div>
       <div id="chartContainer4" width="50px" height="50px">
        <canvas id="myChart4" ></canvas>
       </div>
    -->
        <!-- BODY ENDS HERE -->


      </div>
      <!-- /.content-wrapper -->
      

        <!-- Footer start -->
        <?php
        include_once("../includes/footer.php");
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
   
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/dist/js/demo.js"></script>
    <script src='RunChart.js'></script>
      <script>

var data = <?php echo json_encode($data); ?>;
var labels = <?php echo json_encode($labels); ?>;

var dict={"1":"Jan","2":"Feb","3":"March","4":"April","5":"May","6":"June","7":"July","8":"Aug","9":"Sept","10":"Oct","11":"Nov","12":"Dec"}
var labelArray=[]
for (var i=0;i<labels.length;i++)
{
  labelArray.push(dict[labels[i]]);
}


     $("#selChart").change(function(){
                
                var selected = $(this).children("option:selected").val();
                console.log(selected,labelArray,data);
                if(selected=="line")
                    {  console.log("oi");
                        RunChartLine(selected,data,labelArray);}
                else if (selected=="bar") 
                    {RunChart(selected,data,labelArray);}
                else
                     {RunChart(selected,data,labelArray);}
            }) ; 
     </script>
  </body>

   
</html>