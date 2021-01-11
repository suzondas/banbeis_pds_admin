<?php
$q = 'individual';
$id = $_GET['id'];

if (!isset($id)) {
    header("Location: dashboard.php");
}
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
                                            <?php include('allUsers.php'); ?>
                                            <div class="card" style="width: 400px;">
                                                <img class="card-img-top  box-shadow-custom"
                                                     src="http://192.168.245.36/pds/upload/<?= $individualEmployee->empPhoto ?>"
                                                     alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title h2"><?= $individualEmployee->nameEnglish ?>
                                                        <br>(<?= $individualEmployee->nameBangla ?>)</h5>
                                                    <b>Designation: </b><span
                                                            class="card-text"><?= $individualEmployee->presentDesignation ?></span><br>
                                                    <b>Working Place: </b><span
                                                            class="card-text"><?= $individualEmployee->presentWorkingPlace ?></span>
                                                </div>
                                                <br>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Contacts</div>
                                                    <div class="panel-body">
                                                        <b>Mobile: </b><?= $individualEmployee->mobile ?><br>
                                                        <b>Email: </b><?= $individualEmployee->email ?><br>
                                                    </div>
                                                </div>
                                                <?php if ($_SESSION['alogin'] == 'admin') { ?>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Personal Information</div>
                                                    <div class="panel-body">
                                                        <b>National ID: </b><?= $individualEmployee->nID ?><br>
                                                        <b>Passport No: </b><?= $individualEmployee->passportNo ?>
                                                        <br>
                                                        <b>Date of
                                                            Birth: </b><?= date('d/m/Y', strtotime($individualEmployee->dob)); ?>
                                                        <br>
                                                        <b>Gender: </b><?= $individualEmployee->gender ?><br>
                                                        <b>Religion: </b><?= $individualEmployee->religion ?><br>
                                                        <b>Blood Group: </b><?= $individualEmployee->bloodGroup ?>
                                                        <br>
                                                        <b>Marital
                                                            Status: </b><?= $individualEmployee->marritalStatus ?>
                                                        <br>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Job Information</div>
                                                    <div class="panel-body">
                                                        <b>Original
                                                            Designation: </b><?= $individualEmployee->originalDesignation ?>
                                                        <br>
                                                        <b>Present
                                                            Designation: </b><?= $individualEmployee->presentDesignation ?>
                                                        <br>
                                                        <b>Date of
                                                            Joining: </b><?= date('d/m/Y', strtotime($individualEmployee->dateOfJoining)) ?>
                                                        <br>
                                                        <b>Joining
                                                            Posting: </b><?= $individualEmployee->joiningPosting ?><br>
                                                        <?php if ($_SESSION['alogin'] == 'admin') {
                                                            $individualEmployee->prlDate = date_create($individualEmployee->dob);
                                                            date_add($individualEmployee->prlDate, date_interval_create_from_date_string('59 years'));
                                                            date_add($individualEmployee->prlDate, date_interval_create_from_date_string('-1 day'));
                                                            $individualEmployee->prlDate = date_format($individualEmployee->prlDate, 'd/m/Y');
                                                            date_default_timezone_set('Asia/Dhaka');

                                                            $serviceLength = date_diff(new DateTime(date_format($obj->prlDate, 'Y-m-d')), new DateTime(date_format(date_create($parsedInsideJson->dateOfJoining), 'Y-m-d')));
                                                            ?>
                                                            <b>PRL: </b><?= $individualEmployee->prlDate ?><br>
                                                            <b>Service Length: </b>
                                                            <?= $serviceLength->y ?> Years,
                                                            <?= $serviceLength->m ?> Months,
                                                            <?= $serviceLength->d ?> Days
                                                        <?php } ?>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Posting Records</div>
                                                    <div class="panel-body">
                                                        <?php for ($i = 0; $i < sizeof($individualEmployee->postingRecords); $i++) {
                                                            if ($individualEmployee->postingRecords[$i]->location != '') { ?>
                                                                <b>Location: </b><?php echo($individualEmployee->postingRecords[$i]->location); ?>
                                                                <br>
                                                                <b>Designation: </b><?php echo($individualEmployee->postingRecords[$i]->post); ?>
                                                                <br>
                                                                <b>Type of
                                                                    Posting: </b><?php echo($individualEmployee->postingRecords[$i]->typeOfPosting); ?>
                                                                <br>
                                                                <b>Date: </b><?php echo date('d/m/Y', strtotime($individualEmployee->postingRecords[$i]->from)); ?> - <?php echo date('d/m/Y', strtotime($individualEmployee->postingRecords[$i]->to)); ?>
                                                                <br>
                                                                <hr>
                                                            <?php }
                                                        } ?>
                                                    </div>
                                                </div>
                                                <?php if ($_SESSION['alogin'] == 'admin') { ?>

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Present Address</div>
                                                    <div class="panel-body">
                                                        <b>Village: </b><?php echo($individualEmployee->presentAddress->village); ?>
                                                <br>
                                                <b>Post
                                                    Office: </b><?php echo($individualEmployee->presentAddress->pO); ?>
                                                <br>
                                                <b>Post
                                                    Code: </b><?php echo($individualEmployee->presentAddress->pCode); ?>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Permanent Address</div>
                                            <div class="panel-body">
                                                <b>Village: </b><?php echo($individualEmployee->permanentAddress->village); ?>
                                                <br>
                                                <b>Post
                                                    Office: </b><?php echo($individualEmployee->permanentAddress->pO); ?>
                                                <br>
                                                <b>Post
                                                    Code: </b><?php echo($individualEmployee->permanentAddress->pCode); ?>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Educational Qualification</div>
                                            <div class="panel-body">
                                                <?php for ($i = 0; $i < sizeof($individualEmployee->educationalQualification); $i++) { ?>

                                                    <b>Degree/Certificate: </b><?php echo($individualEmployee->educationalQualification[$i]->degreeOrCertificate); ?>
                                                    <br>
                                                    <b>Result: </b><?php echo($individualEmployee->educationalQualification[$i]->result); ?>
                                                    <br>
                                                    <b>Passing
                                                        Year: </b><?php echo($individualEmployee->educationalQualification[$i]->passingYear); ?>
                                                    <br>
                                                    <b>Subject/Discipline: </b><?php echo($individualEmployee->educationalQualification[$i]->principleSubjects); ?>
                                                    <br>
                                                    <b>Name of
                                                        Institution: </b><?php echo($individualEmployee->educationalQualification[$i]->nameOfInstitution); ?>
                                                    <br>
                                                    <hr>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Training</div>
                                            <div class="panel-body">
                                                <?php for ($i = 0; $i < sizeof($individualEmployee->localTraining); $i++) {
                                                    if ($individualEmployee->localTraining[$i]->title != '') { ?>
                                                        <b>Title: </b><?php echo($individualEmployee->localTraining[$i]->title); ?>
                                                        <br>
                                                        <b>Institution: </b><?php echo($individualEmployee->localTraining[$i]->institution); ?>
                                                        <br>
                                                        <b>Location: </b><?php echo($individualEmployee->localTraining[$i]->location); ?>
                                                        <br>
                                                        <b>Date: </b><?php echo date('d/m/Y', strtotime($individualEmployee->localTraining[$i]->from)); ?> - <?php echo date('d/m/Y', strtotime($individualEmployee->localTraining[$i]->to)); ?>
                                                        <br>
                                                        <b>Grade: </b><?php echo($individualEmployee->localTraining[$i]->grade); ?>
                                                        <br>
                                                        <hr>
                                                    <?php }
                                                } ?>
                                            </div>
                                        </div>
                                        <?php }?>
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

