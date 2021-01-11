<div class="left-sidebar bg-black-300 box-shadow ">
    <div class="sidebar-content">
        <div class="user-info closed">
            <img src="http://placehold.it/90/c2c2c2?text=User" alt="DG BANBEIS" class="img-circle profile-img">
            <h6 class="title">Director General</h6>
            <small class="info">BANBEIS</small>
        </div>
        <!-- /.user-info -->

        <div class="sidebar-nav">
            <ul class="side-nav color-gray">
                <li class="nav-header">
                    <span class="">Main Category</span>
                </li>
                <li>
                    <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>
                </li>
                <li><a href="view-employees.php?q=allEmployees"><i class="fa fa fa-server"></i>
                        <span> All Employees Details</span></a></li>
                <?php
                if($_SESSION['alogin'] == 'admin'){ ?>
                <li><a href="update-employees.php?q=allEmployees"><i class="fa fa fa-server"></i>
                        <span> Update Information</span></a></li>
                <li><a href="prl-dashboard.php"><i class="fa fa fa-server"></i>
                        <span> PRL Dashboard</span></a></li>
                <li><a href="maternity-leave-dashboard.php"><i class="fa fa fa-server"></i>
                        <span> Leave Dashboard</span></a></li>
                        <?php }elseif ($_SESSION['alogin']=='user'){

                }
                        ?>
                <li><a href="birth-day-dashboard.php"><i class="fa fa fa-server"></i>
                        <span> Birth Day Dashboard</span></a></li>
               <!-- <li><a href=""><i class="fa fa fa-server"></i>
                        <span> Admin Change Password</span></a></li>-->
            </ul>
        </div>
        <!-- /.sidebar-nav -->
    </div>
    <!-- /.sidebar-content -->
</div>