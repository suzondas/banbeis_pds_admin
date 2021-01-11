<?php session_start();error_reporting(1);include('includes/config.php');if ($_SESSION['alogin'] != '') {
    $_SESSION['alogin'] = '';
}; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
    <style> /*Animated Text*/
        .ml11 {
            font-weight: 700; /*font-size: 3.5em;*/
        }

        .ml11 .text-wrapper {
            position: relative;
            display: inline-block;
            padding-top: 0.1em;
            padding-right: 0.05em;
            padding-bottom: 0.15em;
        }

        .ml11 .line {
            opacity: 0;
            position: absolute;
            left: 0;
            height: 100%;
            width: 3px;
            background-color: #fff;
            transform-origin: 0 50%;
        }

        .ml11 .line1 {
            top: 0;
            left: 0;
        }

        .ml11 .letter {
            display: inline-block;
            line-height: 1em;
        }

        /*Animated Text*/</style>
</head>
<body class="">
<div class="main-wrapper">
    <div class="row"><h1 align="center" style="color:grey"><span style="color:#2ba4de;font-weight: bold;">BANBEIS</span>&nbsp;<span
                    class="ml11"><span class="text-wrapper"><span class="line line1"></span><span class="letters">PDS ADMIN</span></span></span>
        </h1>
        <hr>
        <div class="col-md-4" style="float:none;margin:auto;">
            <form class="form-horizontal" method="post"
                  style="background: #eee; padding: 10px; border: 2px solid green;">
                <div class="form-group"><label for="inputEmail3" class="col-sm-2 control-label">ID</label>
                    <div class="col-sm-10"><input type="text" name="username" class="form-control" id="inputEmail3"
                                                  placeholder="User Id"></div>
                </div>
                <div class="form-group"><label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10"><input type="password" name="password" class="form-control"
                                                  id="inputPassword3" placeholder="Password"></div>
                </div>
                <div class="form-group mt-20">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="login" class="btn btn-success btn-labeled pull-right">Sign in<span
                                    class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                    </div>
                </div>
            </form>
            <p class="text-muted text-center">
                <small>Copyright © BANBEIS, Ministry of Education</small>
            </p>
        </div>
    </div>
</div>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="js/jquery-ui/jquery-ui.min.js"></script>
<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="js/pace/pace.min.js"></script>
<script src="js/toastr/toastr.min.js"></script>
<script src="js/lobipanel/lobipanel.min.js"></script>
<script src="js/iscroll/iscroll.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<!-- ========== PAGE JS FILES ========== --><!-- ========== THEME JS ========== -->
<script src="js/main.js"></script>
<?php /*if (isset($_POST['login'])) {
    $uname = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':uname', $uname, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $_SESSION['alogin'] = $_POST['username'];
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    } else {
        echo "<script>toastr[\"error\"](\"Invalid Login Credentials!\"); </script>";
    }
} */?>
<?php if (isset($_POST['login'])) {
    $uname = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = 'SELECT USERNAME, PASSWORD FROM ADMIN WHERE USERNAME=:uname and PASSWORD=:password';
    $compiled = oci_parse($conn, $sql);
    oci_bind_by_name($compiled, ':uname', $uname);
    oci_bind_by_name($compiled, ':password', $password);
    oci_execute($compiled);
    $row = oci_fetch_array($compiled , OCI_ASSOC);
    if ($row) {
        $_SESSION['alogin'] = $_POST['username'];
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    }else{
        echo "<script>toastr[\"error\"](\"Invalid Login Credentials!\"); </script>";
    }
    $ID = $row['ID'];
    oci_free_statement($stid);
    oci_close($con);
} ?>

<script> /*Animated text*//* Wrap every letter in a span kudos: https://tobiasahlin.com/moving-letters/#11*/
    var textWrapper = document.querySelector('.ml11 .letters');
    textWrapper.innerHTML = textWrapper.textContent.replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>");
    anime.timeline({loop: true}).add({
        targets: '.ml11 .line',
        scaleY: [0, 1],
        opacity: [0.5, 1],
        easing: "easeOutExpo",
        duration: 700
    }).add({
        targets: '.ml11 .line',
        translateX: [0, document.querySelector('.ml11 .letters').getBoundingClientRect().width + 10],
        easing: "easeOutExpo",
        duration: 700,
        delay: 100
    }).add({
        targets: '.ml11 .letter',
        opacity: [0, 1],
        easing: "easeOutExpo",
        duration: 600,
        offset: '-=775',
        delay: (el, i) => 34 * (i + 1)
    }).add({
        targets: '.ml11',
        opacity: 0,
        duration: 1000,
        easing: "easeOutExpo",
        delay: 1000
    });/*Animated text*/</script>
</body>
</html>
