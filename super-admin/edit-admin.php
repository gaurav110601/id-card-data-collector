<?php
    include 'header.php';
    // include_once('header.php');
    // require('header.php');
    // require_once('header.php');

    include 'database.php';
    // $ID;
    // $id = isset($_GET['edit']);
    if(isset($_GET['edit']))
    {
        $id = $_GET['edit'];
        $query = "SELECT * FROM admins  WHERE id= $id";
        $result = mysqli_query($conn, $query);
        $editData= mysqli_fetch_assoc($result);
        $name = $editData['name'];
        $mob_no = $editData['mob_no'];
        $email = $editData['email'];
        $password = $editData['password'];
        $institute = $editData['institute'];

        // $ID = $id;
// echo $ID;
    }
    // echo $id;
    if(isset($_POST['update']) /*&& isset($_GET['edit'])*/ ){
        // echo $ID;
        // $id = $_GET['edit'];
        // echo $id;
        $name = $_POST['name'];
        $mob_no = $_POST['mob_no'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $institute = $_POST['institute'];
        $query   =  "UPDATE admins SET
                     name='$name',
                     mob_no  = '$mob_no',
                     email   = '$email',
                     password   = '$password',
                     institute   = '$institute'
                     WHERE id = '$id'";
       $rs= mysqli_query($conn, $query);
       if($rs){
           // header("Location: success.html");
            // exit();
// echo "agent edited successfully";
            ?>
                <script type="text/javascript">
                    alert('Admin updated successfully');
                    window.location = "admins.php";
                </script> 

            <?php 
            
       }
       mysqli_close($conn);
     }
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

                        <li class="side-nav-item">
                            <a href="index.php" class="side-nav-link">
                                <i class="ri-dashboard-3-line"></i>
                                <span> Dashboard </span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                        </li>
                        <li class="side-nav-item menuitem-active">
                            <a href="admins.php" class="side-nav-link">
                                <i class="ri-admin-line"></i>
                                <span> Admins </span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                        </li>
                        <li class="side-nav-item">
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admins</a></li>
                                        <!-- <li class="breadcrumb-item active">Editable Table</li> -->
                                    </ol>
                                </div>
                                <h4 class="page-title">Admins</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Edit Admin</h4>
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
                                            <label class="form-label" for="validationCustom01">Full Name</label>
                                            <input type="text" maxlength="50" name="name" class="form-control" id="validationCustom01"
                                                placeholder="Full Name" required value="<?php echo $name; ?>">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom02">Mobile Number</label>
                                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" name="mob_no" maxlength="10" minlength="10" class="form-control" id="validationCustom02"
                                                placeholder="Mobile Number" required value="<?php echo $mob_no; ?>">
                                            <div class="invalid-feedback">
                                            Please provide a valid Mobile Number.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom03">E-mail</label>
                                            <input type="email" name="email" class="form-control" id="validationCustom03"
                                                placeholder="E-mail" required maxlength="50" value="<?php echo $email; ?>">
                                            <div class="invalid-feedback">
                                                Please provide a valid E-mail.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom04">Password</label>
                                            <input type="text" name="password"  maxlength="50" class="form-control" id="validationCustom04"
                                                placeholder="Password" required value="<?php echo $password; ?>">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom04">Institute</label>
                                            <input type="text" name="institute" maxlength="200" class="form-control" id="validationCustom05"
                                                placeholder="Institute" required value="<?php echo $institute; ?>">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        
                                        <!-- <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="invalidCheck"
                                                    required>
                                                <label class="form-check-label form-label" for="invalidCheck">Agree to
                                                    terms
                                                    and conditions</label>
                                                <div class="invalid-feedback">
                                                    You must agree before submitting.
                                                </div>
                                            </div>
                                        </div> -->

                                        <button class="btn btn-primary" type="submit" name="update">Submit</button>
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