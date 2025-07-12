<?php
    include 'header.php';
    // include_once('header.php');
    // require('header.php');
    // require_once('header.php');

    include('database.php');

    if(isset($_GET['limit'])){
        $limit = $_GET['limit'];
    }else{
        $limit = 10;
    }
    // $page = $_GET['page'];
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $offset = ($page - 1) * $limit;

$table_search = "";
        if(isset($_POST['table_search_submit'])){
            $table_search = $_POST['table_search'];
            // echo $table_search;
        }
        $form_table_name = $_SESSION['form_table_name'];
        $form_table_attributes = $_SESSION['form_table_attributes'];
        
        if($table_search == ""){
            $query = "SELECT * FROM $form_table_name ORDER BY id LIMIT {$offset},{$limit}";
            $result = mysqli_query($conn, $query);
            // echo $table_search;
        }else{
            $form_attributes_query = "SELECT * FROM $form_table_attributes";
            $rs_attributes = mysqli_query($conn, $form_attributes_query);
            $form_attributes_data = mysqli_fetch_assoc($rs_attributes);
            $col="";
            $like = " LIKE '%$table_search%' or "; 
            foreach($form_attributes_data['input_field_name'] as $key){
                $col = $col.$key.$comma;
            }
            $col = substr($col, 0, -4);
            $col = str_replace(' ','_',$col);
            $col = str_replace("'","",$col);
            

            // echo $table_search;
            $query = "SELECT * FROM $form_table_name WHERE $col ORDER BY id LIMIT {$offset},{$limit}";
            $result = mysqli_query($conn, $query);
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
                        <li class="side-nav-item">
                            <a href="form.php" class="side-nav-link">
                                <i class="ri-survey-line"></i>
                                <span> Form </span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                        </li>
                        <li class="side-nav-item menuitem-active">
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Form Data</a></li>
                                        <!-- <li class="breadcrumb-item active">Editable Table</li> -->
                                    </ol>
                                </div>
                                <h4 class="page-title">Form Data</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- <div class="card-header">
                                    <h4 class="header-title">Basic Data Table</h4>
                                    <p class="text-muted mb-0">
                                        DataTables has most features enabled by default, so all you need to do to use it
                                        with your own tables is to call the construction
                                        function:
                                        <code>$().DataTable();</code>. KeyTable provides Excel like cell navigation on
                                        any table. Events (focus, blur, action etc) can be assigned to individual
                                        cells, columns, rows or all cells.
                                    </p> 
                                </div> -->
                                <div class="card-header py-3">
                            <div class="row">
                                <div class="col">
                                    <h4 class="header-title">Form Data</h4>
                                </div>
                                <!-- <div class="col" style="text-align: right;"><a class="btn btn-primary" role="button" style="text-align: left;" href="add-admin.php">+ Add</a></div> -->
                            </div>
                        </div>
                                <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                                <option value="form-data.php?limit=10" <?php 
                                                if(!(isset($_GET['limit'])) || ($_GET['limit'] == 10)){
                                                    echo 'selected';
                                                }
                                            ?>>10</option>
                                                <option value="form-data.php?limit=25" <?php 
                                                if(isset($_GET['limit']) && ($_GET['limit'] == 25)){
                                                    echo 'selected';
                                                }
                                            ?>>25</option>
                                                <option value="form-data.php?limit=50" <?php 
                                                if(isset($_GET['limit']) && ($_GET['limit'] == 50)){
                                                    echo 'selected';
                                                }
                                            ?>>50</option>
                                                <option value="form-data.php?limit=100" <?php 
                                                if(isset($_GET['limit']) && ($_GET['limit'] == 100)){
                                                    echo 'selected';
                                                }
                                            ?>>100</option>
                                            </select>&nbsp;</label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter">
                                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" method="POST">
                                            <div class="input-group">
                                                <label class="form-label">
                                                    <input type="text" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search" name="table_search">
                                                </label>
                                                <button class="btn btn-primary py-0" type="submit" name="table_search_submit"><i class="bi bi-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                        <th> S.No </th>
                                            <?php 
                                                $form_attributes_query = "SELECT * FROM $form_table_attributes";
                                                $rs_attributes = mysqli_query($conn, $form_attributes_query);
                                                while($form_attributes_data = mysqli_fetch_assoc($rs_attributes)) {
                                                    $val = $form_attributes_data['input_field_name'];
                                                    ?>
                                                        <th> <?php echo $val; ?> </th>
                                                    <?php
                                                }
                                            ?>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php
                                        if (mysqli_num_rows($result) > 0) {
                                            $sn=$offset+1;
                                            while($data = mysqli_fetch_assoc($result)) {
                                    ?>

                                        <tr>
                                            <th> <?php echo $sn; ?> </th>

                                            <?php
                                                $form_attributes_query = "SELECT * FROM $form_table_attributes";
                                                $rs_attributes = mysqli_query($conn, $form_attributes_query);
                                                while($form_attributes_data = mysqli_fetch_assoc($rs_attributes)) {
                                                    $val = $form_attributes_data['input_field_name'];
                                                    $val = str_replace(' ','_',$val);
                                                    $val = str_replace("'","",$val);
                                                    $val = str_replace(".","",$val);
                                                    if($form_attributes_data['input_type'] == 'file'){
                                                        ?>
                                                            <th> <img src="assets/images/photos/<?php echo $form_table_name."/".$data[$val]; ?>" width="100px" height="100px"> </th>
                                                        <?php
                                                    }else{
                                                        ?>
                                                            <th> <?php echo $data[$val]; ?> </th>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </tr>
                                        

                                    <?php
                                        $sn++;
                                    }
                                }else{
                                            ?>

                                            <td colspan="8"> <center><span style="color:red;">No data found</span></center> </td>

                                            <?php

                                        }  ?>

                                    </tbody>
                                </table>
                            </div>

                            <?php

                            $sql = "SELECT * FROM $form_table_name";
                            $rs = mysqli_query($conn, $sql);

                            if(mysqli_num_rows($rs) > 0){

                                $total_records = mysqli_num_rows($rs);
                                
                                $total_page = ceil($total_records / $limit);

                                $show_from_record = ($offset + 1);
                                if($page!=$total_page){
                                    $show_to_record = ($limit * $page);
                                }else{
                                    $show_to_record = $total_records;
                                }

                                ?>

                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite"><?php echo'Showing '.$show_from_record.' to '.$show_to_record.' of '.$total_records; ?></p>
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <?php
                                            if($page > 1){
                                                echo '<li class="page-item"><a class="page-link" aria-label="Previous" href="form-data.php?page='.($page -1).'"><span aria-hidden="true">«</span></a></li>';
                                            }else{
                                                echo '<li class="page-item disabled"><a class="page-link" aria-label="Previous" href="form-data.php?page='.($page -1).'"><span aria-hidden="true">«</span></a></li>';
                                            }
                                            
                                            for($i =1; $i<=$total_page; $i++){
                                                if($i == $page){
                                                    $active = "active";
                                                }else{
                                                    $active = "";
                                                }
                                                echo '<li class="page-item '.$active.'"><a class="page-link" href="form-data.php?page='.$i.'">'.$i.'</a></li>';
                                            }

                                            if($total_page > $page){
                                                echo '<li class="page-item"><a class="page-link" aria-label="Next" href="form-data.php?page='.($page +1).'"><span aria-hidden="true">»</span></a></li>';
                                            }else{
                                                echo '<li class="page-item disabled"><a class="page-link" aria-label="Next" href="form-data.php?page='.($page +1).'"><span aria-hidden="true">»</span></a></li>';
                                            }
                                            
                                            ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
<?php
                            }

                            ?>
                        </div>
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->

                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <?php
    include 'footer.php';
?>