<?php
    include 'header.php';
    // include_once('header.php');
    // require('header.php');
    // require_once('header.php');

    date_default_timezone_set("Asia/Kolkata");

    if(isset($_POST['submit'])){
        // $arr = (array($_POST));
        include 'database.php';

        $col=$_POST['col'];
        $val=$_POST['val'];
        $form_table_name = $_POST['form_table_name'];

        // $form_id = $_SESSION['form_id'];
        // $form_query = "SELECT * FROM users WHERE form_id = $form_id";
        // $rs = mysqli_query($conn, $form_query);
        // $form_data = mysqli_fetch_assoc($rs);
        // $form_table_name = $form_data['form_table_name'];
        // $form_table_attributes = $form_data['form_table_attributes'];

        // $form_attributes_query = "SELECT * FROM $form_table_attributes";
        // $rs_attributes = mysqli_query($conn, $form_attributes_query);
        // while($form_attributes_data = mysqli_fetch_assoc($rs_attributes)) {
        //     if ($form_attributes_data['input_type'] == 'file'){
        //         $file_key = $form_attributes_data['input_field_name'];
        //         $image = $_FILES[$file_key];
                
                // print_r($image);
        if(isset($_POST['file'])){

            $image_name = $_POST['image_name'];
                $image_path = 'assets/images/photos/preview/'.$image_name;
                $image_error = $_POST['image_error'];
                if ($image_error == 0){
                    $image_dest = '../super-admin/assets/images/photos/'.$form_table_name."/".$image_name;
                    copy($image_path, $image_dest);
                    $image_dest = '../admin/assets/images/photos/'.$form_table_name."/".$image_name;
                    copy($image_path, $image_dest);
                    $image_dest = 'assets/images/photos/'.$form_table_name."/".$image_name;
                    copy($image_path, $image_dest);
                    unlink("assets/images/photos/preview/".$image_name);
                }
        //     }
        }
        
        
        // $val_str = "'";
        // $comma = ", ";
        // if($_FILES){
        //     $col = $col.$file_key.$comma;
        //     $val = $val.$val_str.$image_name.$val_str.$comma;
        // }
        // foreach($_POST as $key => $value){
        //     // print_r($key);
        //     // print_r($value);
            
        //     $col = $col.$key.$comma;
        //     $val = $val.$val_str.$value.$val_str.$comma;
        // }
        // print_r($col);

        
        $col = substr($col, 0, -2);
        $val = substr($val, 0, -2);
        
        $query = "INSERT INTO ".$form_table_name." (".$col.") VALUES (".$val.")";
        // print_r($query);
        $rs = mysqli_query($conn, $query);

        if($rs){
            // echo "data was deleted successfully";

            ?>
                <script type="text/javascript">
                    alert('Form Filled');
                    window.location = "form.php";
                </script>  

            <?php 
        }

        // connnection closed.
        mysqli_close($conn);


    }

    include 'database.php';
        $form_id = $_SESSION['form_id'];
        $form_query = "SELECT * FROM forms WHERE id = $form_id";
        $rs = mysqli_query($conn, $form_query);
        $form_data = mysqli_fetch_assoc($rs);
        
?>  

            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">

                <!-- Brand Logo Light -->
                <a href="index.php" class="logo logo-light;">
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
                                        <li class="breadcrumb-item active">Form Preview</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Form Perview</h4>
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
                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <tbody>
                                        <?php
                                            $form_id = $_SESSION['form_id'];
                                            $form_query = "SELECT * FROM users WHERE form_id = $form_id";
                                            $rs = mysqli_query($conn, $form_query);
                                            $form_data = mysqli_fetch_assoc($rs);
                                            $form_table_name = $form_data['form_table_name'];
                                            $form_table_attributes = $form_data['form_table_attributes'];
                                            $form_attributes_query = "SELECT * FROM $form_table_attributes";
                                            $rs_attributes = mysqli_query($conn, $form_attributes_query);

                                            while($form_attributes_data = mysqli_fetch_assoc($rs_attributes)) {
                                                if ($form_attributes_data['input_type'] == 'file'){
                                                    $file_key = $form_attributes_data['input_field_name'];
                                                    $image = $_FILES[$file_key];
                                                    $image_name = date("YmdHis")."_".$image['name'];
                                                    $image_path = $image['tmp_name'];
                                                    $image_error = $image['error'];
                                                    
                                                    $image_dest = 'assets/images/photos/preview/'.$image_name;
                                                    move_uploaded_file($image_path, $image_dest);
                                        ?>
                                        <tr>
                                            <td style="text-align:right;"><b><?php echo $file_key; ?></b></td>
                                            <td><img src="assets/images/photos/preview/<?php echo $image_name ?>" height="100px" width="100px"></td>
                                        </tr>
                                        <?php
                                                }
                                            }
                                            $col="";
                                            $val="";
                                            $val_str = "'";
                                            $comma = ", ";
                                            if($_FILES){
                                                $col = $col.$file_key.$comma;
                                                // print_r($col);
                                                $val = $val.$val_str.$image_name.$val_str.$comma;
                                                // print_r($val);
                                            }

                                            foreach($_POST as $key => $value){
                                                if($key != 'submit'){
                                                    $col = $col.$key.$comma;
                                                    // print_r($key);
                                                    $val = $val.$val_str.$value.$val_str.$comma;
                                        ?>
                                        <tr>
                                            <td style="text-align:right;"><b><?php echo str_replace('_',' ',$key); ?></b></td>
                                            <td><?php echo $value; ?></td>
                                        </tr>
                                        <?php
                                                }
                                                
                                            }
                                        ?>
                                        <tr>
                                            <td style="text-align:right;">
                                                <a class="btn btn-purple" onclick="history.back()"><<<Back>Back</Back></a>
                                            </td>
                                            <td>
                                                <form method="POST">
                                                    <?php
                                                    // print_r($val);
                                                        if($_FILES){
                                                            ?>
                                                            <input type="hidden" name="<?php echo "file"; ?>" value="">
                                                            <input type="hidden" name="<?php echo "image_name"; ?>" value="<?php echo $image_name; ?>">
                                                            <input type="hidden" name="<?php echo "image_error"; ?>" value="<?php echo $image_error; ?>">
                                                            
                                                            <?php
                                                        }
                                                    ?>
                                                    <input type="hidden" name="<?php echo "col"; ?>" value="<?php echo $col; ?>">
                                                    <input type="hidden" name="<?php echo "val"; ?>" value="<?php echo $val; ?>">
                                                    <input type="hidden" name="<?php echo "form_table_name"; ?>" value="<?php echo $form_table_name; ?>">
                                                    <button class="btn btn-primary" type="submit" name="submit">Confirm</button>
                                                </form>
                                            </td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

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