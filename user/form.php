<?php
    include 'header.php';
    // include_once('header.php');
    // require('header.php');
    // require_once('header.php');

    

    include 'database.php';
        $form_id = $_SESSION['form_id'];
        $form_query = "SELECT * FROM forms WHERE id = $form_id ";
        $rs = mysqli_query($conn, $form_query);
        $form_data = mysqli_fetch_assoc($rs);

        
        
?>  

            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">

                <!-- Brand Logo Light -->
                <a href="index.html" class="logo logo-light;">
                    <span class="logo-lg" style="padding-top: 20px;">
                        <!-- <img src="assets/images/logo.png" alt="logo"> -->
                        <h3 style="color: white;">User</h3>
                    </span>
                    <span class="logo-sm" style="margin-left: -10px; margin-top: 10px;">
                        <!-- <img src="assets/images/logo-sm.png" alt="small logo"> -->
                        <h5 style="color: white;">User</h5>
                    </span>
                </a>

                <!-- Brand Logo Dark -->
                <a href="index.php" class="logo logo-dark">
                    <span class="logo-lg" style="margin-top: -25px;">
                        <!-- <img src="assets/images/logo.png" alt="logo"> -->
                        <h3 >User</h3>
                    </span>
                    <span class="logo-sm" style="margin-left: -10px;">
                        <!-- <img src="assets/images/logo-sm.png" alt="small logo"> -->
                        <h5 >User</h5>
                    </span>
                </a>

                <hr>
                <!-- Sidebar -left -->
                <div class="h-100" id="leftside-menu-container" data-simplebar>
                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <!-- <li class="side-nav-title">Main</li> -->

                        <li class="side-nav-item">
                            <a href="index.php" class="side-nav-link">
                                <i class="ri-dashboard-3-line"></i>
                                <span> Dashboard </span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                        </li>
                        <li class="side-nav-item menuitem-active">
                            <a href="form.php" class="side-nav-link">
                                <i class="ri-survey-line"></i>
                                <span> Form </span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="form-data.php" class="side-nav-link">
                                <i class="ri-survey-line"></i>
                                <span> Form Data </span>
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Form</a></li>
                                        <!-- <li class="breadcrumb-item active">Editable Table</li> -->
                                    </ol>
                                </div>
                                <h4 class="page-title">Form</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->



                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title"><?php echo $form_data['form_name']; ?></h4>
                                    <p class="text-muted mb-0"><?php echo $form_data['form_description']; ?></p>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate method="POST" action="form-preview.php" enctype="multipart/form-data">
                                        <?php
                                        $form_table_name = $form_data['form_table_name'];
                                        $form_table_attributes = $form_data['form_table_attributes'];
                                            $query = "SELECT * FROM $form_table_attributes";
                                            $result = mysqli_query($conn, $query);

                                            if (mysqli_num_rows($result) > 0) {
                                                // $sn=$offset+1;
                                                while($data = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01"><?php echo $data['input_field_name']; ?></label>
                                            <input type="<?php echo $data['input_type']; ?>" maxlength="<?php echo $data['input_length']; ?>" name="<?php echo str_replace("'","",str_replace(' ','_',$data['input_field_name'])); ?>" class="form-control" id="validationCustom01" placeholder="<?php echo $data['input_field_name'];?>" <?php if($data['input_type'] == 'file'){echo 'accept="image/*"';} ?> <?php echo $data['required']; ?>>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                        <?php
                                            // $sn++;
                                        }
                                    }
                                    ?>

                                        <button class="btn btn-primary" type="submit" name="">Submit</button>
                                    </form>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                        <div class="col-lg-3"></div>

                    </div>
                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <?php
    include 'footer.php';
?>