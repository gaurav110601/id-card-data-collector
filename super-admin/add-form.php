<?php
    include 'header.php';
    // include_once('header.php');
    // require('header.php');
    // require_once('header.php');

    include 'database.php';

    if(isset($_POST['submit'])){
        $form_name = $_POST['form_name'];
        $form_description = $_POST['form_description'];
        $admin_id = $_POST['admin_id'];
        // print_r($admin_id);

        $query_admin = 'SELECT institute FROM admins where id = "'.$admin_id.'"';
        $result = mysqli_query($conn, $query_admin);
        $data = mysqli_fetch_assoc($result);
        $institute = $data['institute'];

        date_default_timezone_set("Asia/Kolkata");

        $form_table_name = $admin_id."_form_".date("YmdHis");
        $form_table_attributes = $admin_id."_form_attributes_".date("YmdHis");

        $input_field_name = $_POST['input_field_name'];
        $input_type = $_POST['input_type'];
        $input_length = $_POST['input_length'];

        $query = 'INSERT INTO forms (form_name, form_description, form_table_name, form_table_attributes, institute_name, admin_id, active) 
        VALUES ("'.$form_name.'", "'.$form_description.'", "'.$form_table_name.'", "'.$form_table_attributes.'", "'.$institute.'", "'.$admin_id.'", 1)';
        $rs = mysqli_query($conn, $query);

        $query_create_form_attribute_table = 'create table '.$form_table_attributes.'(id INT AUTO_INCREMENT, input_field_name VARCHAR(100), input_type VARCHAR(50), input_length INT, required VARCHAR(20) ,primary key (id))';  
        $rs_create_form_attribute_table = mysqli_query($conn, $query_create_form_attribute_table);

        $query_form_table = 'create table '.$form_table_name.'(id INT AUTO_INCREMENT, primary key (id))';  
        $rs_form_table = mysqli_query($conn, $query_form_table);

        foreach ($input_field_name as $key => $value) {
            $query_insert_form_attribute_table = 'INSERT INTO '.$form_table_attributes.' (input_field_name, input_type, input_length, required) 
            VALUES ("'.str_replace("_","",str_replace(".","_",$value)).'", "'.$input_type[$key].'", '.$input_length[$key].', "'.$_POST["required$key"].'")';
            $rs_insert_form_attribute_table = mysqli_query($conn, $query_insert_form_attribute_table);
            // print_r($query_insert_form_attribute_table);
            // print_r($rs_insert_form_attribute_table);    

            $query_form_table_add_column = 'ALTER TABLE '.$form_table_name.' ADD '.str_replace("'","",str_replace(' ','_',str_replace("_","",str_replace(".","_",$value)))).' varchar(100)';
            $rs_form_table_add_column = mysqli_query($conn, $query_form_table_add_column);

            // // if($input_type[$key] == "text"){
            // //     $query_form_table_add_column = 'ALTER TABLE '.$form_table_name.' ADD '.str_replace(' ','_',$value).' varchar(100)';
            // //     $rs_form_table_add_column = mysqli_query($conn, $query_form_table_add_column);
            // //     // print_r($query_form_table_add_column);
            // // }else{
            // //     $query_form_table_add_column = 'ALTER TABLE '.$form_table_name.' ADD '.str_replace(' ','_',$value).' INT(10))';
            // //     $rs_form_table_add_column = mysqli_query($conn, $query_form_table_add_column);
            // //     // print_r($rs_form_table_add_column);
            // // }

        }

        $path = "../super-admin/assets/images/photos/".$form_table_name;
        mkdir($path, 0777, true);
        $path = "../admin/assets/images/photos/".$form_table_name;
        mkdir($path, 0777, true);
        $path = "../user/assets/images/photos/".$form_table_name;
        mkdir($path, 0777, true);
        

        ?>
                <script type="text/javascript">
                    alert('Form added successfully');
                    window.location = "forms.php";
                </script> 

        <?php

        // connnection closed.
        mysqli_close($conn);

    }
?>  

            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">

                <!-- Brand Logo Light -->
                <a href="index.php" class="logo logo-light;">
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
                <a href="index.html" class="logo logo-dark">
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

                        <li class="side-nav-item">
                            <a href="index.php" class="side-nav-link">
                                <i class="ri-dashboard-3-line"></i>
                                <span> Dashboard </span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="admins.php" class="side-nav-link">
                                <i class="ri-admin-line"></i>
                                <span> Admins </span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                        </li>
                        <li class="side-nav-item menuitem-active">
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
                <div class="container-fluid" id="wrap">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Super-Admin</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                        <!-- <li class="breadcrumb-item active">Editable Table</li> -->
                                    </ol>
                                </div>
                                <h4 class="page-title">Forms</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Add Form</h4>
                                    <!-- <p class="text-muted mb-0">Custom feedback styles apply custom colors, borders,
                                        focus styles, and background
                                        icons to better communicate feedback. Background icons for
                                        <code>&lt;select&gt;</code>s are only available with
                                        <code>.form-select</code>, and not <code>.form-control</code>. -->
                                    </p>
                                </div>
                                <form method="POST">
                                <div class="card-body" id="form">
                                
                                    <div class="row">
                                        <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">Form Name</label>
                                                    <input type="text" id="simpleinput" class="form-control" name="form_name" required>
                                                </div>
                                        </div> <!-- end col -->

                                        <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">Form Description</label>
                                                    <input type="text" id="simpleinput" class="form-control" name="form_description" >
                                                </div>
                                        </div> <!-- end col -->

                                        <div class="col-lg-4">
                                        <div class="mb-3">
                                                    <label for="example-select" class="form-label">College / School</label>

                                                    <select class="form-select" id="example-select" name="admin_id" required>
                                                        <option value="" selected="">Select</option>

                                                        <?php
                                                            $query = "SELECT * FROM admins where active = 1 ORDER BY id DESC";
                                                            $result = mysqli_query($conn, $query);

                                                            if (mysqli_num_rows($result) > 0) {
                                                                while($data = mysqli_fetch_assoc($result)) {
                                                        ?>

                                                        <option value="<?php echo $data['id']; ?>"><?php echo $data['institute']; ?></option>
                                                        
                                                        

                                                        <?php
                                                                }
                                                            }
                                                        ?>
                                                        
                                                    </select>
                                                    

                                                </div>
                                        </div> <!-- end col -->
                                        <hr>
                                    </div>
                                    <!-- end row-->

                                    <div class="row">   
                                        <div class="col-lg-12">
                                        <div class="mb-3">
                                            <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                <span class="input-group-btn input-group-append" style="margin: 1px;">
                                                    <button class="btn btn-success bootstrap-touchspin-up " id="add-image-field" type="button" ><b>Add Image Field</b></button>
                                                </span>
                                                <span class="input-group-btn input-group-append" style="margin: 1px;">
                                                    <button class="btn btn-success bootstrap-touchspin-up " id="add-text-field" type="button" ><b>Add Text Field</b></button>
                                                </span>
                                                <span class="input-group-btn input-group-prepend" style="margin: 1px;">
                                                    <button class="btn btn-success bootstrap-touchspin-down" id="add-number-field" type="button"><b>Add Number Field</b></button>
                                                </span>
                                            </div>
                                        </div>
                                        </div> 
                                        <!-- end col -->
                                    </div>

                                    

                                    <script>
                                        $(document).ready(function(){
                                            var i=0;
	                                        $('#add-image-field').click(function(){
	                                            $('#form').append('<div class="row" id="input-field'+i+'"><div class="col-lg-4"><div class="mb-3"><input type="text" id="simpleinput" class="form-control" placeholder="Image Field" name="input_field_name[]" required><input type="hidden" id="simpleinput" class="form-control" name="input_type[]" value="file" required></div></div> <!-- end col --><div class="col-lg-3"><div class="mb-3"><input type="hidden" value="200" id="simpleinput" class="form-control" placeholder="Length" name="input_length[]" required></div></div> <!-- end col --><div class="col-lg-2"><div class="mb-3"><div class="input-group bootstrap-touchspin bootstrap-touchspin-injected"><span class="input-group-btn input-group-prepend" style="margin: 1px;"><button class="btn btn-danger bootstrap-touchspin-down remove-input-field" type="button" id="'+i+'"><span class="mdi mdi-delete"></span></button></span></div></div></div><!-- end col --><div class="col-lg-3"><div class="mt-2"><div class="form-check form-check-inline"><input type="hidden" id="customRadio3" name="required'+i+'" class="form-check-input" value="required" checked><!-- <label class="form-check-label" for="customRadio3">Required</label> --></div></div></div><!-- end col --></div><!-- end row-->');
	                                            i++;
	                                        });
	
                                            $('#add-text-field').click(function(){
	                                            $('#form').append('<div class="row" id="input-field'+i+'"><div class="col-lg-4"><div class="mb-3"><input type="text" id="simpleinput" class="form-control" placeholder="Text Field" name="input_field_name[]" required><input type="hidden" id="simpleinput" class="form-control" name="input_type[]" value="text" required></div></div> <!-- end col --><div class="col-lg-3"><div class="mb-3"><input type="number" id="simpleinput" class="form-control" placeholder="Length" name="input_length[]" required></div></div> <!-- end col --><div class="col-lg-3"><div class="mt-2"><div class="form-check form-check-inline"><input type="radio" id="customRadio3" name="required'+i+'" class="form-check-input" value="required" checked><label class="form-check-label" for="customRadio3">Required</label></div><div class="form-check form-check-inline"><input type="radio" id="customRadio4" name="required'+i+'" class="form-check-input" value=""><label class="form-check-label" for="customRadio4">Not Required</label></div></div></div> <!-- end col --><div class="col-lg-2"><div class="mb-3"><div class="input-group bootstrap-touchspin bootstrap-touchspin-injected"><span class="input-group-btn input-group-prepend" style="margin: 1px;"><button class="btn btn-danger bootstrap-touchspin-down remove-input-field" type="button" id="'+i+'"><span class="mdi mdi-delete"></span></button></span></div></div></div> <!-- end col --></div><!-- end row-->');
	                                            i++;
	                                        });
	
                                            $('#add-number-field').click(function(){
	                                            $('#form').append('<div class="row" id="input-field'+i+'"><div class="col-lg-4"><div class="mb-3"><input type="text" id="simpleinput" class="form-control" placeholder="Number Field" name="input_field_name[]" required><input type="hidden" id="simpleinput" class="form-control" name="input_type[]" value="number" required></div></div> <!-- end col --><div class="col-lg-3"><div class="mb-3"><input type="number" id="simpleinput" class="form-control" placeholder="Length" name="input_length[]" required></div></div> <!-- end col --><div class="col-lg-3"><div class="mt-2"><div class="form-check form-check-inline"><input type="radio" id="customRadio3" name="required'+i+'" class="form-check-input" value="required" checked><label class="form-check-label" for="customRadio3">Required</label></div><div class="form-check form-check-inline"><input type="radio" id="customRadio4" name="required'+i+'" class="form-check-input" value=""><label class="form-check-label" for="customRadio4">Not Required</label></div></div></div> <!-- end col --><div class="col-lg-2"><div class="mb-3"><div class="input-group bootstrap-touchspin bootstrap-touchspin-injected"><span class="input-group-btn input-group-prepend" style="margin: 1px;"><button class="btn btn-danger bootstrap-touchspin-down remove-input-field" type="button" id="'+i+'"><span class="mdi mdi-delete"></span></button></span></div></div></div> <!-- end col --></div><!-- end row-->');
	                                            i++;
	                                        });
	
                                            $(document).on('click', '.remove-input-field', function(){
                                                var button_id = $(this).attr("id"); 
                                                $('#input-field'+button_id+'').remove();
                                                i--;
	                                        });
                                        });
                                    </script>
                                
                                </div> <!-- end card-body -->
                                <button class="btn btn-primary" style="margin: 25px; margin-top: -25px;" type="submit" name="submit">Submit</button>

                                </form>
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