<?php

$q = 'individual';

session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['id'])) {
            $id = $_POST["id"];
            $sql = 'SELECT * FROM PDS WHERE EMPID = :empid';
            $compiled = oci_parse($conn, $sql);
            oci_bind_by_name($compiled, ':empid', $id);
            oci_execute($compiled);
            $row = oci_fetch_array($compiled, OCI_ASSOC);
            if ($row) {
                $empData = $row["DATA"]->load();
                $individualEmployee = json_decode($empData);
                $individualEmployee->presentWorkingPlace = $_POST["workingPlace"];
                $submitData = json_encode($individualEmployee);
                oci_close($con);

                $sql1 = 'UPDATE PDS SET DATA = :data where EMPID =:id';
                $compiled1 = oci_parse($conn, $sql1);
                oci_bind_by_name($compiled1, ':data', $submitData);
                oci_bind_by_name($compiled1, ':id', $id);
                oci_execute($compiled1);
                oci_close($con);
                header("Refresh:0; url=update-employees.php?q=allEmployees");
            } else {
                echo "Data of this User Not Found!";
                exit;
            }
        }
    } else {

        $id = $_GET['id'];

        if (!isset($id)) {
            header("Location: dashboard.php");
        }
        $sql = 'SELECT * FROM PDS WHERE EMPID = :empid';
        $compiled = oci_parse($conn, $sql);
        oci_bind_by_name($compiled, ':empid', $id);
        oci_execute($compiled);
        $row = oci_fetch_array($compiled, OCI_ASSOC);
        if ($row) {
            $empData = $row["DATA"]->load();
            $individualEmployee = json_decode($empData);
        } else {
            echo "Data of this User Not Found!";
            exit;
        }
        oci_close($con);
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BANBEIS PDS ADMIN</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
        <link rel="stylesheet" href="css/prism/prism.css" media="screen">
        <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
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
            .errorWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #dd3d36;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            }

            .succWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #5cb85c;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            }

            .card-img-top {
                height: 180px !important;
                -webkit-border-radius: 20%;
                -moz-border-radius: 20%;
                border-radius: 20%;
            }

            .card .panel-heading {
                background-color: dodgerblue !important;
                color: white;
            }

            .card .panel-body {
                background-color: #eeeeee !important;
                /*color:black;*/
            }
        </style>
    </head>
    <body class="top-navbar-fixed">
    <div class="main-wrapper">

        <!-- ========== TOP NAVBAR ========== -->
        <?php include('includes/topbar.php'); ?>
        <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
        <div class="content-wrapper">
            <div class="content-container">
                <?php include('includes/leftbar.php'); ?>

                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-6">
                                <h2 class="title">Employee Details</h2>
                            </div>
                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->

                    <section class="section">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <!--                                                    <h5>Employee Details</h5>-->
                                            </div>
                                        </div>
                                        <?php if ($msg) { ?>
                                            <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                                            </div><?php } else if ($error) { ?>
                                            <div class="alert alert-danger left-icon-alert" role="alert">
                                                <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                            </div>
                                        <?php } ?>
                                        <div class="panel-body p-20">
                                            <div class="card" style="width: 400px;">
                                                <img class="card-img-top  box-shadow-custom"
                                                     src="http://192.168.245.36/pds/upload/<?= $individualEmployee->empPhoto ?>"
                                                     alt="Card image cap">
                                                <div class="card-body">
                                                </div>
                                                <form action="update-employee.php" method="post">
                                                    <h5 class="card-title h2"><?= $individualEmployee->nameEnglish ?>
                                                        <br>(<?= $individualEmployee->nameBangla ?>)</h5>
                                                    <b>Designation: </b><span
                                                            class="card-text"><?= $individualEmployee->presentDesignation ?></span><br>
                                                    <b>Working Place: </b>
                                                    <span
                                                            class="card-text">
                                                        <?php

                                                        $uitrceList = file_get_contents("uitrceList.json");

                                                        $uitrceList = json_decode($uitrceList);

                                                        ?>
                                                        <select name="workingPlace">
                                                            <option value="">Select</option>
                                                            <option value="Head Office">Head Office</option>
                                                            <?php
                                                            for ($i = 0; $i < sizeof($uitrceList); $i++) {
                                                                echo "<option value='" . $uitrceList[$i]->text . "'>" . $uitrceList[$i]->text . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </span>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <input type="hidden" name="id" value="<?= $id ?>"/>
                                                    <input type="submit" value="Update">
                                                </form>
                                            </div>


                                            <!-- /.col-md-12 -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-md-6 -->
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-md-6 -->
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
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="js/prism/prism.js"></script>
    <script src="js/DataTables/datatables.min.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>
    <script>
        $(function ($) {
            $('#example').DataTable({
                responsive: true
            });

            $('#example2').DataTable({
                "scrollY": "300px",
                "scrollCollapse": true,
                "paging": false
            });

            $('#example3').DataTable();
        });
    </script>
    </body>
    </html>
<?php } ?>

