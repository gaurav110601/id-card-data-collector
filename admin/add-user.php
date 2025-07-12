<?php
    include 'header.php';
    // include_once('header.php');
    // require('header.php');
    // require_once('header.php');

    include 'database.php';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $mob_no = $_POST['mob_no'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $form_id = $_POST['form_id'];
        $admin_id = $_POST['admin_id'];
        
        $query_form = 'SELECT * FROM forms where id = "'.$form_id.'"';
        $result = mysqli_query($conn, $query_form);
        $data = mysqli_fetch_assoc($result);
        $form_name = $data['form_name'];
        $form_table_name = $data['form_table_name'];
        $form_table_attributes = $data['form_table_attributes'];

        // database connection create
        include('database.php');
        // print_r($_POST);
// echo $password;
        //This below line is a code to Send form entries to database
        $query = 'INSERT INTO users (name, mob_no, email, password, form_name, form_table_name, form_table_attributes, active, form_id, admin_id) 
        VALUES ("'.$name.'", "'.$mob_no.'", "'.$email.'", "'.$_POST['password'].'", "'.$form_name.'", "'.$form_table_name.'", "'.$form_table_attributes.'", 1, "'.$form_id.'", "'.$admin_id.'")';
// echo $query;
        //fire query to save entries and check it with if statement
        $rs = mysqli_query($conn, $query);
        
        if($rs)
        {

            ?>
                <script type="text/javascript">
                    alert('User added successfully');
                    window.location = "users.php";
                </script> 

            <?php 
                      
            
        }
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
                        <h3 style="color: white;">Admin</h3>
                    </span>
                    <span class="logo-sm" style="margin-left: -10px; margin-top: 10px;">
                        <!-- <img src="assets/images/logo-sm.png" alt="small logo"> -->
                        <h5 style="color: white;">Admin</h5>
                    </span>
                </a>

                <!-- Brand Logo Dark -->
                <a href="index.php" class="logo logo-dark">
                    <span class="logo-lg" style="margin-top: -25px;">
                        <!-- <img src="assets/images/logo.png" alt="logo"> -->
                        <h3 >Admin</h3>
                    </span>
                    <span class="logo-sm" style="margin-left: -10px;">
                        <!-- <img src="assets/images/logo-sm.png" alt="small logo"> -->
                        <h5 >Admin</h5>
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
                        <li class="side-nav-item ">
                            <a href="forms.php" class="side-nav-link">
                            <i class="ri-survey-line"></i>
                                <span> Forms </span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                        </li>
                        <li class="side-nav-item menuitem-active">
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                        <!-- <li class="breadcrumb-item active">Editable Table</li> -->
                                    </ol>
                                </div>
                                <h4 class="page-title">Users</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Add User</h4>
                                    <!-- <p class="text-muted mb-0">Custom feedback styles apply custom colors, borders,
                                        focus styles, and background
                                        icons to better communicate feedback. Background icons for
                                        <code>&lt;select&gt;</code>s are only available with
                                        <code>.form-select</code>, and not <code>.form-control</code>. -->
                                    </p>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate method="POST">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Name</label>
                                            <input type="text" maxlength="50" name="name" class="form-control" id="validationCustom01"
                                                placeholder="Full Name" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom02">Mobile Number</label>
                                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" name="mob_no" maxlength="10" minlength="10" class="form-control" id="validationCustom02"
                                                placeholder="Mobile Number" required>
                                            <div class="invalid-feedback">
                                            Please provide a valid Mobile Number.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom03">E-mail</label>
                                            <input type="email" name="email" class="form-control" id="validationCustom03"
                                                placeholder="E-mail" required maxlength="50">
                                            <div class="invalid-feedback">
                                                Please provide a valid E-mail.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom04">Password</label>
                                            <input type="text" name="password"  maxlength="50" class="form-control" id="validationCustom04"
                                                placeholder="Password" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                                    <label for="example-select" class="form-label">Form</label>

                                                    <select class="form-select" id="example-select" name="form_id" required>
                                                        <option value="" selected="">Select</option>

                                                        <?php
                                                            $query = "SELECT * FROM forms where admin_id = ".$_SESSION['admin-id']." AND active=1 ORDER BY id DESC";
                                                            $result = mysqli_query($conn, $query);

                                                            if (mysqli_num_rows($result) > 0) {
                                                                while($data = mysqli_fetch_assoc($result)) {
                                                                    
                                                        ?>

                                                        <option value="<?php echo $data['id']; ?>"><?php echo $data['form_name']; ?></option>

                                                        <?php
                                                                }
                                                            }
                                                        ?>
                                                        
                                                    </select>
                                                    

                                                </div>
                                        </div> <!-- end col -->
                                        <input type="hidden" name="admin_id" value="<?php echo $_SESSION['admin-id']; ?>" >
                                        <button class="btn btn-primary" style="margin: 25px; margin-top: -25px;" type="submit" name="submit">Submit</button>
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