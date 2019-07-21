<?php
include_once "../classes/Graph.class.php";
include_once "../classes/Database.class.php";
$db=(new Database())->getConnection();
$graph=new Graph($db);
$results=$graph->studentMonthlyAttendance();
$labels=array();
$data=array();
foreach ($results as $result){
    extract($result);
    array_push($labels,$month);
    array_push($data,$cnt);
}
print_r($labels);
print_r($data);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Aptifier | Graphs</title>
    <!-- Favicon -->
    <link href="../assets/data2/images/faviconb.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="../assets/css/argon.css?v=1.0.0" rel="stylesheet">
</head>

<body>
<!-- Sidenav -->
<?php include_once("./templates/sidebar.php"); ?>
<!-- Sidenav Ends here-->

<!-- Main content -->
<div class="main-content">
    <!-- Top navbar -->
    <?php include_once("templates/topbar.php"); ?>
    <!-- Top navbar here -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <form action="" method="post">
                <input type="submit" name="subject" value="Subjects" class="btn" style="background:#f9f9f9;color:#04456B;margin-bottom:15px;px;">
                <input type="submit" name="chapter" value="Chapter" class="btn" style="background:#f9f9f9;color:#04456B;margin-bottom:15px;px;">
                <input type="submit" name="score" value="Score" class="btn" style="background:#f9f9f9;color:#04456B;margin-bottom:15px;px;">
                <input type="submit" name="month" value="Previous Month" class="btn" style="background:#f9f9f9;color:#04456B;margin-bottom:15px;px;">
                <input type="submit" name="performance" value="Overall Performance" class="btn" style="background:#f9f9f9;color:#04456B;margin-bottom:15px;px;">
                <div id="container" style="height:550px; width:1000px; display:none; background-color: white;">
                    <?php echo $headline; ?>
                    <canvas id="class"></canvas>
                </div>


            </form>
        </div>

    </div>
    <!-- Page content -->

</div>

<!-- Charts.js Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

<script src="../assets/js/myChart.js"></script>
<script>
    var type = "<?php echo $type; ?>";
    var data = <?php echo json_encode($data); ?>;
    var labels = <?php echo json_encode($labels); ?>;

    document.getElementById("container").style.display = "block";
    if (type == 1) {
        renderPieChart(data, labels, "Subjects")
    } else if (type == 2) {
        renderChart(data, labels, "bar");
    } else if (type == 3) {
        renderChart(data, labels, "horizontalBar");
    } else if (type == 4) {
        renderDoubleChart(data, data1, labels,"bar");
    } else if (type == 5) {
        renderLineChart(data, labels);
    }

</script>
<!-- Core -->
<script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Optional JS -->
<script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="../assets/js/argon.js?v=1.0.0"></script>
</body>

</html>
?>

