<?php
session_start();
error_reporting();
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
        <link rel="stylesheet" href="css/fullcalendar/main.min.css" media="screen">
        <link rel="stylesheet" href="css/main.css" media="screen">
        <script src="js/modernizr/modernizr.min.js"></script>
        <style>
            #calendar{
                background: white;
                padding: 10px;
                border-top: 10px solid wheat;
                /* color: #6ca026; */
                box-shadow: 0 0 11px black;
            }
            .fc-widget-header th {
                background-color: #6577ce !important;
                color:white !important;
            }
            .fc-today{
                background-color: dodgerblue !important;
                box-shadow: 0 0 7px gray;
                font-weight: bold;
                font-size: 20px;
                color:black;

            }
            .fc-event{
                background: #ffdb58 ;
                color: red;
                font-weight: bold;
            }
            }
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
                                <h2 class="title">Birth Day Dashboard</h2>

                            </div>

                            <!-- /.col-sm-6 -->
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /.container-fluid -->
<?php include("birthDaySummery.php"); ?>
                    <section class="section">
                        <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-9">
                                <div id="calendar">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="panel-group">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">Employee Details</div>
                                        <div class="panel-body"><b style="font-size:12px;font-weight: bold;">(Select Birth Day to See Details)</b><br>
                                           Name:  <span id="empName"></span><br>
                                           Designation:  <span id="empDesignation"></span><br>
                                           Location:  <span id="empPresentWorkingPlace"></span><br>
                                           Birth Day: <span id="dob"></span><br>
                                        </div>
                                    </div>
                                    <div class="panel panel-success">
                                        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEASABIAAD/4Qm+aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJYTVAgQ29yZSA0LjQuMC1FeGl2MiI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyI+IDxkYzpjcmVhdG9yPiA8cmRmOlNlcT4gPHJkZjpsaT5WZWN0b3JTdG9jay5jb20vMjE4MDY2MTQ8L3JkZjpsaT4gPC9yZGY6U2VxPiA8L2RjOmNyZWF0b3I+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDw/eHBhY2tldCBlbmQ9InciPz7/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsKCwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8XGBYUGBIUFRT/2wBDAQMEBAUEBQkFBQkUDQsNFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBT/wAARCAD6AO4DAREAAhEBAxEB/8QAHAABAAIDAQEBAAAAAAAAAAAAAAUGAQMEAgcI/8QAORABAAIBAgIHBAgGAgMAAAAAAAECAwQRBQYWITFBU5LRElGBkRMUIkJSYaHBIzJxcrHhNWIkQ3P/xAAWAQEBAQAAAAAAAAAAAAAAAAAAAQL/xAAWEQEBAQAAAAAAAAAAAAAAAAAAEQH/2gAMAwEAAhEDEQA/AP322wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAxuB1+4D4AbgyAAAAAAAAAAAAAAAAAAAAAAADAI/iHHNJw+k+3kjJk7seOYm3x9xBWdbzPrdVMxjtGmx+7H2/NqCLyZ8uWd75b3n32tMg94tXqME748+Sk/8AW8wDux8z8Rx7ROat9vx0iSCS0fOPXFdVg2j8eL0lILFptVi1mKMmHJXJSe+qDcAAAAAAAAAAAAAAAAAAAADXmzU0+K2TJaKUrG82nuBS+L8xZ+IWtjxTbDpuyKx1Tb+vo1BE7bAAAAAA6uH8RzcMzxlw26vvUnstH5gveg12LiGlpmxT9m3bE9tZ74lkdIAAAAAAAAAAAAAAAAAAMSCj8wcWtxHV2pS3/jYp2rEfenvloRQAAAAAAAJjljiP1PXxhtbbFn+z191u6f2NF2ZAAAAAAAAAAAAAAAAAAHDxnWRoeG58m+1vZ9mv909UGD5/HY0AAAAAAAAG8xMTE7THZIPo3D9R9b0WDN35KRaf697I6AAAAAAAAAAAAAAAAAAVnnPPMU0uGJ7Zm8/Dqj/Mrgq6gAAAAAAABIL3y7ExwbSb/hn/ADLOiTAAAAAAAAAAAAAAAAABTecLe1xLFX8OKP1mVwQagAAAAAAABIL1y1b2+Dab/r7Vf1lnRKAAAAAAAAAAAAAAAAAApXNv/Lx/86/u1ghgAAAAAAAAJ7AXblX/AIbH/db/ACmiYQAAAAAAAAAAAAAAAAYtaKxMzO0R1zMgovMWtw6/iMZcF/bpFIrvtMdcTLWCMAAAAAAAAABb+Vdfgtoseli/8evtWmkx3b93vTRPoAAAAAAAAAAAAAAAAOXicTPD9VEdv0Vv8A+dx2NAAAAAAAAAACU5ZiZ41g291t/LJovMdjIyAAAAAAAAAAAAAAADXmx/S4r0/HWa/OAfNprNJms9tZ2loYAAAAAAAAABN8o4ZycUtk7seOZn49RouUMjIAAAAAAAAAAAAAAAMSCh8waX6rxfPG21bz9JX+k/73aEcAAAAAAAAAC3cn6Wceiy5pjact9on8o/3umiwIAAAAAAAAAAAAAAAAAOfV6HBraexmx1yRtMRNo3mv5wD55lxW0+a+K/ValprPwaHgAAAAAAAE1ytw6mu1mS+bHGTFjr/LaN4mZ7P3NFypSKVitYitYjaIiNohkegAAAAAAAAAAAAAAAAAYkFP5t0E4NbXU1j7GaNrf3R6w1gggAAAAAAJBeuXtBOg4bSLRtkyfxL/Hsj5JolEAAAAAAAAAAAAAAAAAAAHNxDQ4+IaW+DJ1Vt2THbWe6QfP9Xpb6LU5MGSPt0naduyfzaGoAAAAAE1y1wiNfn+sZY/gYrR1T963u/oaLnDIyAAAAAAAAAAAAAAAAAAAAClc2REcX3jvx13/VrBDAAAAAT2Au3KlYjg+P872mfmmiYQAAAAAAAAAAAAAAAAAAAAeb3ilZtaYrWO2ZnaIBReYtVj1nFcl8V4vjitaxaOydoawRoAAAAEgt3KWtxTofq85Kxlre0xSZ65ifcmifQZAAAAAAAAAAAAAAAAAABp1WacGmy5Kx7U0pNtvftG4KDruKaniVt8+SZr3Ur1Vj4NDlAAAAAAA79+8Fi5b4zqsusx6TLf6bHaJ2m3Xau0b9qaLXEoMgAAAAAAAAAAAAAAwDXn1WLS09vNkpir77zsCE1vN+nxb109LZ7fin7NfVYIDXcb1nEImuTL7GOf8A14+qv+1HAAAAAAAAAD1S9sd4tS00tHZas7TAJnRc2arT7VzxGpp756rfMgntHzJodZtH0v0N5+7l6v17EglItExExO8T2TCDIAAAAAAAAAANWfU4tNT28uSuKvvvOwIfV826TDvGGL6i3vj7NfnKwQur5p12p3jHNdPWfwR1/OVgismS+a83yWte0/etO8g8gAAAAAAAAAAAAbA6NLr9ToZ/gZr4490T1fLsBM6TnHNTaNThrkj8VPsz8uxIJrScxaHV7RGaMV5+7l+zPokElExMRMdk9kgyAAAAADEzsCscY5ptF7YdFMbR1Tmnr8vqsFcy5b57zfLe2S8/etO8qPAAAAAAAAAAAAAAAAAAAGwOrRcU1XDrRODLMV76T11n4AuPBuN4uLY5jb6PPWN7Y9/1j8mYJMAAAAEFzXxGdLo64KTtfPvEzHdWO359i4KcoAAAAAAAAAAAAAAAAAAAAAA26XU30Wox58U7XpO8fn+QPommz11Wnx5qfyXrFo+LI2gAAwCl82ZpycWmndjx1j59f7tYIYAAAAAAAAAAAAAAAAAAAAAAAF25VzTl4Rjieucd7U/Xf900TCAAACJ1vLWl1+qvnyZM0XvtvFZjbqjb3FGjodovFz+avotDodovFz+avoUOh2i8XP5q+hQ6HaLxc/mr6FDodovFz+avoUOh2i8XP5q+hQ6HaLxc/mr6FDodovFz+avoUOh2i8XP5q+hQ6HaLxc/mr6FDodovFz+avoUOh2i8XP5q+hQ6HaLxc/mr6FDodovFz+avoUOh2i8XP5q+hQ6HaLxc/mr6FDodovFz+avoUOh2i8XP5q+hQ6HaLxc/mr6FDodovFz+avoUOh2i8XP5q+hQ6HaLxc/mr6FDodovFz+avoUOh2i8XP5q+hRI8N4Zi4XhtixWvas29r7cxM7/CEHYAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD//Z" id="empPhoto" style="width:100%" />
                                    </div>
                                </div>
                            </div>
                        </div>

                            <!-- /.row -->
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

    <!-- ========== THEME JS ========== -->
    <script src="js/moment/moment.min.js"></script>
    <script src="js/fullcalendar/main.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/production-chart.js"></script>
    <script src="js/traffic-chart.js"></script>
    <script src="js/task-list.js"></script>
    <script>
        $(document).ready(function() {
            var imgUserBlank = "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEASABIAAD/4Qm+aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJYTVAgQ29yZSA0LjQuMC1FeGl2MiI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyI+IDxkYzpjcmVhdG9yPiA8cmRmOlNlcT4gPHJkZjpsaT5WZWN0b3JTdG9jay5jb20vMjE4MDY2MTQ8L3JkZjpsaT4gPC9yZGY6U2VxPiA8L2RjOmNyZWF0b3I+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDw/eHBhY2tldCBlbmQ9InciPz7/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsKCwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8XGBYUGBIUFRT/2wBDAQMEBAUEBQkFBQkUDQsNFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBT/wAARCAD6AO4DAREAAhEBAxEB/8QAHAABAAIDAQEBAAAAAAAAAAAAAAUGAQME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";

            $('#calendar').fullCalendar({
                // defaultDate: '2014-09-12',
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                themeSystem: 'bootstrap',
                events:[
                    <?php
                    if(sizeof($MaternityLeaveArr)>0){
                        for($i = 0 ; $i<sizeof($MaternityLeaveArr);$i++){
                            echo "{title: '".
                                $MaternityLeaveArr[$i]->name."', start: '".
                                $MaternityLeaveArr[$i]->dobCustom. "', end: '".
                                $MaternityLeaveArr[$i]->dobCustom."', designation: '".
                                $MaternityLeaveArr[$i]->designation."', presentWorkingPlace: '".
                                $MaternityLeaveArr[$i]->presentWorkingPlace. "', dob: '".
                                $MaternityLeaveArr[$i]->dob. "', empPhoto: '".
                                $MaternityLeaveArr[$i]->empPhoto."'},";
                        }
                    }
                    ?>
                ],
                eventClick: function(info) {
                    $("#empPhoto").attr('src',imgUserBlank);
                    $("#empName").text(info.title)
                    $("#empDesignation").text(info.designation)
                    $("#empPresentWorkingPlace").text(info.presentWorkingPlace)
                    $("#dob").text(moment(info.start).format("DD/MM/YYYY"))
                    $("#empPhoto").attr('src',"http://192.168.245.36/pds/upload/"+info.empPhoto)

                }
            });
        });
    </script>
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
            // toastr["success"]("Welcome to PRL Dashboard!");


        });
    </script>
    </body>
    </html>
<?php } ?>
