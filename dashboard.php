<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PDS ADMIN</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
        <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen">
        <link rel="stylesheet" href="css/icheck/skins/line/blue.css">
        <link rel="stylesheet" href="css/icheck/skins/line/red.css">
        <link rel="stylesheet" href="css/icheck/skins/line/green.css">
        <link rel="stylesheet" href="css/main.css" media="screen">
        <script src="js/modernizr/modernizr.min.js"></script>
        <style>
            /*custom css*/
            .box-shadow-custom {
                -webkit-box-shadow: -5px 6px 82px -27px rgba(0, 0, 0, 0.75) !important;
                -moz-box-shadow: -5px 6px 82px -27px rgba(0, 0, 0, 0.75) !important;
                box-shadow: -5px 6px 82px -27px rgba(0, 0, 0, 0.75) !important;
                padding-bottom: 10px;
            }

            .box-shadow-custom-header {
                margin: 0px;
                text-align: center;
            }

            /*custom css*/
        </style>
    </head>
    <body class="top-navbar-fixed">
    <div class="main-wrapper">
        <?php include('includes/topbar.php'); ?>
        <div class="content-wrapper">
            <div class="content-container">

                <?php include('includes/leftbar.php'); ?>

                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-sm-6">
                                <h2 class="title">Employees Dashboard</h2>

                            </div>
                            <!-- /.col-sm-6 -->
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /.container-fluid -->
<!--                    --><?php //include "allUsersDashboardSummery.php"; ?>
                    <section class="section">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="" style="" class="box-shadow-custom">
                                        <h5 class="box-shadow-custom-header"><i class="fa fa-home"></i> Center Wise Existing Employees</h5>
                                        <canvas id="chart-area3"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="" style="" class="box-shadow-custom">
                                        <h5 class="box-shadow-custom-header"><i class="fa fa-road"></i> Grade Wise Existing Employees</h5>
                                        <canvas id="chart-area5"></canvas>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="" style="" class="box-shadow-custom">
                                        <h5 class="box-shadow-custom-header"><i class="fa fa-group"></i> Gender Wise Employees</h5>
                                        <canvas id="chart-area1" class=""></canvas>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="" style="" class="box-shadow-custom">
                                        <h5 class="box-shadow-custom-header"><i class="fa fa-signing"></i> Marital Status Wise Employees</h5>
                                        <canvas id="chart-area2"></canvas>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="" style="" class="box-shadow-custom">
                                        <h5 class="box-shadow-custom-header"><i class="fa fa-random"></i> Designation Wise Existing Employees</h5>
                                        <canvas id="chart-area4"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </section>
                    <!-- /.section -->

                </div>
                <!-- /.main-page -->


            </div>

            <!-- /.content-container -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /.main-wrapper -->

    <!-- ========== COMMON JS FILES ========== -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/jquery-ui/jquery-ui.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="js/prism/prism.js"></script>
    <script src="js/waypoint/waypoints.min.js"></script>
    <script src="js/counterUp/jquery.counterup.min.js"></script>
    <script src="js/amcharts/amcharts.js"></script>
    <script src="js/amcharts/serial.js"></script>
    <script src="js/amcharts/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="js/amcharts/plugins/export/export.css" type="text/css" media="all"/>
    <script src="js/amcharts/themes/light.js"></script>
    <script src="js/toastr/toastr.min.js"></script>
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/chartjs/chart.min.js"></script>
    <script src="js/chartjs/utils.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>
    <script src="js/production-chart.js"></script>
    <script src="js/traffic-chart.js"></script>
    <script src="js/task-list.js"></script>
    <?php
    include_once "summery-maker.php";
    ?>
    <script>
        $(function () {


            // Counter for dashboard stats
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });

            // Welcome notification
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"]("Welcome!");

        });

        /*Chartsj*/
        var randomScalingFactor = function () {
            return Math.round(Math.random() * 100);
        };

        var config1 = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [
                        <?= sizeof($genderwise->male); ?>,
                        <?= sizeof($genderwise->female); ?>
                    ],
                    backgroundColor: [
                        window.chartColors.orange,
                        window.chartColors.blue,
                    ],
                    label: 'Gender Wise Employees'
                }],
                labels: [
                    'Male',
                    'Female'
                ]
            },
            options: {
                responsive: true
            }
        };
        var config2 = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        <?= sizeof($marritalWise->married); ?>,
                        <?= sizeof($marritalWise->unmarried); ?>
                    ],
                    backgroundColor: [
                        window.chartColors.blue,
                        window.chartColors.red
                    ],
                    label: 'Marital Status wise'
                }],
                labels: [
                    'Married',
                    'Unmarried'
                ]
            },
            options: {
                responsive: true
            }
        };
        var config3 = {
            type: 'polarArea',
            data: {
                datasets: [{
                    data: [
                        <?= sizeof($locationWise->headoffice); ?>,
                        <?= sizeof($locationWise->uitrce); ?>
                    ],
                    backgroundColor: [
                        window.chartColors.purple,
                        window.chartColors.blue
                    ],
                    label: 'Center Wise Employees'
                }],
                labels: [
                    'Head Office',
                    'UITRCEs'
                ]
            },
            options: {
                responsive: true
            }
        };
        var config4 = {
            type: 'bar',
            data: {
                datasets: [{
                    data: [
                        <?php
                        foreach ($designationWise as $key => $val) {
                            echo $val . ',';
                        }
                        ?>
                    ],
                    backgroundColor: [
                        <?php
                        $getRandomColor = function () {
                            return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
                        };
                        foreach ($designationWise as $key => $val) {
                            echo "'" . $getRandomColor() . "'" . ",";
                        }
                        ?>
                    ],
                    label: 'Designation wise employees'
                }],
                labels: [
                    <?php
                    foreach ($designationWise as $key => $val) {
                        echo '"' . $key . '",';
                    }
                    ?>
                ]
            },
            options: {
                legend: {
                    display: false,
                },
                responsive: true
            }
        };
        var config5 = {
            type: 'bar',
            data: {
                datasets: [{
                    data: [
                        <?php
                        foreach ($gradeWiseData as $key => $val) {
                            echo $val . ',';
                        }
                        ?>
                    ],
                    backgroundColor: [<?php
                        $getRandomColor = function () {
                            return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
                        };
                        for ($i = 0; $i < sizeof($gradeWiseData); $i++) {
                            echo "'" . $getRandomColor() . "'" . ",";
                        }
                        ?>],
                    label: ''
                }],
                labels: [
                    <?php
                    foreach ($gradeWiseData as $key => $val) {
                        echo '"Grade ' . $key . '",';
                    }
                    ?>
                ]
            },
            options: {
                responsive: true,
                legend: {
                    display: false,
                }
            }
        };

        window.onload = function () {
            var ctx1 = document.getElementById('chart-area1').getContext('2d');
            var ctx2 = document.getElementById('chart-area2').getContext('2d');
            var ctx3 = document.getElementById('chart-area3').getContext('2d');
            var ctx4 = document.getElementById('chart-area4').getContext('2d');
            var ctx5 = document.getElementById('chart-area5').getContext('2d');
            // var ctx5 = document.getElementById('chart-area5').getContext('2d');
            window.myDoughnut = new Chart(ctx1, config1);
            window.myDoughnut = new Chart(ctx2, config2);
            window.myPolarArea = new Chart(ctx3, config3);
            window.myBar = new Chart(ctx4, config4);
            window.myBar = new Chart(ctx5, config5);
        };
        var colorNames = Object.keys(window.chartColors);

        /*Chartsj*/
    </script>
    </body>
    </html>
<?php } ?>
