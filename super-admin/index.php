<?php
    include 'header.php';
    // include_once('header.php');
    // require('header.php');
    // require_once('header.php');
?>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">

                <!-- Brand Logo Light -->
                <a href="index.html" class="logo logo-light;">
                    <span class="logo-lg" style="padding-top: 20px;">
                        <!-- <img src="assets/images/logo.png" alt="logo"> -->
                        <h3 style="color: white;">Super-Admin</h3>
                    </span>
                    <span class="logo-sm" style="margin-left: -10px; margin-top: 10px;">
                        <!-- <img src="assets/images/logo-sm.png" alt="small logo"> -->
                        <h5 style="color: white;">Super-Admin</h5>
                    </span>
                </a>

                <!-- Brand Logo Dark -->
                <a href="index.php" class="logo logo-dark">
                    <span class="logo-lg" style="margin-top: -25px;">
                        <!-- <img src="assets/images/logo.png" alt="logo"> -->
                        <h3 >Super-Admin</h3>
                    </span>
                    <span class="logo-sm" style="margin-left: -10px;">
                        <!-- <img src="assets/images/logo-sm.png" alt="small logo"> -->
                        <h5 >Super-Admin</h5>
                    </span>
                </a>

                <hr>
                <!-- Sidebar -left -->
                <div class="h-100" id="leftside-menu-container" data-simplebar>
                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <!-- <li class="side-nav-title">Main</li> -->

                        <!-- <li class="side-nav-item menuitem-active"> -->
                        <li class="side-nav-item menuitem-active">
                            <a href="index.php" class="side-nav-link">
                                <i class="ri-dashboard-3-line"></i>
                                <span> Dashboard </span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                        </li>
                        <li class="side-nav-item ">
                            <a href="admins.php" class="side-nav-link">
                                <i class="ri-admin-line"></i>
                                <span> Admins </span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                        </li>
                        <li class="side-nav-item ">
                            <a href="forms.php" class="side-nav-link">
                            <i class="ri-survey-line"></i>
                                <span> Forms </span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                        </li>
                        <li class="side-nav-item ">
                            <a href="users.php" class="side-nav-link">
                            <i class="ri-user-line"></i>
                                <span> Users </span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                        </li>
                    </ul>
                    <!--- End Sidemenu -->

                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- ========== Left Sidebar End ========== -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Super-Admin</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <!-- <li class="breadcrumb-item active">Welcome!</li> -->
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Welcome!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <?php
                            include 'database.php';

                            $query = "SELECT * FROM admins";
                            $result = mysqli_query($conn, $query);
                            
                            $count = 0;
                            while($data = mysqli_fetch_assoc($result)){
                                if($data['active'] == 1){
                                    $count++;
                                }
                            }
                        ?>

                        <div class="row">
                            <div class="col-xxl-3 col-sm-4">
                                <div class="card widget-flat text-bg-pink">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="ri-eye-line widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Total Admins Created</h6>
                                        <h2 class="my-2"><?php echo mysqli_num_rows($result); ?></h2>
                                        <p class="mb-0">
                                            <span class="badge bg-white bg-opacity-10 me-1"><?php echo $count; ?></span>
                                            <span class="text-nowrap">Active</span>
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <?php
                            include 'database.php';

                            $query = "SELECT * FROM forms";
                            $result = mysqli_query($conn, $query);
                            
                            $count = 0;
                            while($data = mysqli_fetch_assoc($result)){
                                if($data['active'] == 1){
                                    $count++;
                                }
                            }
                        ?>

                            <div class="col-xxl-3 col-sm-4">
                                <div class="card widget-flat text-bg-purple">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="ri-wallet-2-line widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Total Admins Created</h6>
                                        <h2 class="my-2"><?php echo mysqli_num_rows($result); ?></h2>
                                        <p class="mb-0">
                                            <span class="badge bg-white bg-opacity-10 me-1"><?php echo $count; ?></span>
                                            <span class="text-nowrap">Active</span>
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <?php
                            include 'database.php';

                            $query = "SELECT * FROM users";
                            $result = mysqli_query($conn, $query);
                            
                            $count = 0;
                            while($data = mysqli_fetch_assoc($result)){
                                if($data['active'] == 1){
                                    $count++;
                                }
                            }
                        ?>

                            <div class="col-xxl-3 col-sm-4">
                                <div class="card widget-flat text-bg-info">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="ri-shopping-basket-line widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Total Admins Created</h6>
                                        <h2 class="my-2"><?php echo mysqli_num_rows($result); ?></h2>
                                        <p class="mb-0">
                                            <span class="badge bg-white bg-opacity-10 me-1"><?php echo $count; ?></span>
                                            <span class="text-nowrap">Active</span>
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->
                        </div>


                        <div class="row">
                            <div class="col-xl-12">
                                <!-- Todo-->
                                <div class="card">
                                    <div class="card-body p-0">
                                        <!-- <div class="p-3">
                                            <h5 class="header-title mb-0">Projects</h5>
                                        </div> -->
    
                                        <div id="yearly-sales-collapse" class="collapse show">
    
                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Admin Name</th>
                                                            <th>Form</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $sn = 1;
                                                            $query_table_admin = "SELECT * FROM admins ORDER BY name";
                                                            $rs_table_admin = mysqli_query($conn, $query_table_admin);

                                                            while($data_table_admin = mysqli_fetch_assoc($rs_table_admin)){
                                                                $admin_id = $data_table_admin['id'];
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $sn++; ?></td>
                                                            <td><?php echo $data_table_admin['name']; ?></td>
                                                            <td>
                                                                <table class="table table-nowrap table-hover mb-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Form Name</th>
                                                                            <th>User</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                            $query_table_form = "SELECT * FROM forms WHERE admin_id = '$admin_id' ORDER BY form_name";
                                                                            $rs_table_form = mysqli_query($conn, $query_table_form);
                                                                            
                                                                            while($data_table_form = mysqli_fetch_assoc($rs_table_form)){
                                                                                $form_id = $data_table_form['id'];
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $data_table_form['form_name']; ?></td>
                                                                            <td>
                                                                                <table>
                                                                                    <tbody>
                                                                                        <?php 
                                                                                            $query_table_user = "SELECT * FROM users WHERE form_id = '$form_id' ORDER BY name";
                                                                                            $rs_table_user = mysqli_query($conn, $query_table_user);
                                                                                            
                                                                                            while($data_table_user = mysqli_fetch_assoc($rs_table_user)){
                                                                                        ?>
                                                                                        <tr>
                                                                                            <td><?php echo $data_table_user['name']; ?></td>
                                                                                        </tr>
                                                                                        <?php
                                                                                            }
                                                                                        ?>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </tbody>
                                                                </table>     
                                                            </td>
                                                        </tr>

                                                        <?php
                                                            }
                                                        ?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>        
                                        </div>
                                    </div>                           
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->

<?php
    include 'footer.php';
?>