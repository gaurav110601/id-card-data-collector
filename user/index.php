<?php
    include 'header.php';
    // include_once('header.php');
    // require('header.php');
    // require_once('header.php');
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

                        <!-- <li class="side-nav-item menuitem-active"> -->
                        <li class="side-nav-item menuitem-active">
                            <a href="index.php" class="side-nav-link">
                                <i class="ri-dashboard-3-line"></i>
                                <span> Dashboard </span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                        </li>
                        <li class="side-nav-item ">
                            <a href="form.php" class="side-nav-link">
                            <i class="ri-survey-line"></i>
                                <span> Forms </span>
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <!-- <li class="breadcrumb-item active">Welcome!</li> -->
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Welcome!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <?php
                                include 'database.php';

                                $id = $_SESSION['form_id'];
                                $query_form_details = "SELECT * FROM forms WHERE id = '$id'";
                                $result_form_details = mysqli_query($conn, $query_form_details);
                                $data_form_details = mysqli_fetch_assoc($result_form_details);

                            ?>

                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-pink">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="ri-eye-line widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Your Form Name</h6>
                                        <h2 class="my-2"><?php echo $data_form_details['form_name'] ?></h2>
                                        <p class="mb-0">
                                            <!-- <span class="badge bg-white bg-opacity-10 me-1">2.97%</span> -->
                                            <!-- <span class="text-nowrap"><?php echo $data_form_details['form_description'] ?></span> -->
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->
                            <?php

                                $form_table_name = $_SESSION['form_table_name'];
                                $query_form_table = "SELECT * FROM $form_table_name order by id desc  limit 10";
                                $result_form_table = mysqli_query($conn, $query_form_table);
                                // $data_form_table = mysqli_fetch_assoc($result_form_table);
                                // print_r(mysqli_num_rows($result_form_table));

                            ?>

                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-purple">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="ri-wallet-2-line widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Total entries you have filled</h6>
                                        <h2 class="my-2"><?php echo mysqli_num_rows($result_form_table); ?></h2>
                                        <p class="mb-0">
                                            <!-- <span class="badge bg-white bg-opacity-10 me-1">18.25%</span>
                                            <span class="text-nowrap">Since last month</span> -->
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <!-- <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-info">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="ri-shopping-basket-line widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Orders</h6>
                                        <h2 class="my-2">753</h2>
                                        <p class="mb-0">
                                            <span class="badge bg-white bg-opacity-25 me-1">-5.75%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                </div>

                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-primary">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="ri-group-2-line widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Users</h6>
                                        <h2 class="my-2">63,154</h2>
                                        <p class="mb-0">
                                            <span class="badge bg-white bg-opacity-10 me-1">8.21%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                </div>
                            </div> end col -->
                        </div>

                        <!-- <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-widgets">
                                            <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                            <a data-bs-toggle="collapse" href="#weeklysales-collapse" role="button" aria-expanded="false" aria-controls="weeklysales-collapse"><i class="ri-subtract-line"></i></a>
                                            <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                        </div>
                                        <h5 class="header-title mb-0">Weekly Sales Report</h5>

                                        <div id="weeklysales-collapse" class="collapse pt-3 show">
                                            <div dir="ltr">
                                                <div id="revenue-chart" class="apex-charts" data-colors="#3bc0c3,#1a2942,#d1d7d973"></div>
                                            </div>
    
                                            <div class="row text-center">
                                                <div class="col">
                                                    <p class="text-muted mt-3">Current Week</p>
                                                    <h3 class=" mb-0">
                                                        <span>$506.54</span>
                                                    </h3>
                                                </div>
                                                <div class="col">
                                                    <p class="text-muted mt-3">Previous Week</p>
                                                    <h3 class=" mb-0">
                                                        <span>$305.25 </span>
                                                    </h3>
                                                </div>
                                                <div class="col">
                                                    <p class="text-muted mt-3">Conversation</p>
                                                    <h3 class=" mb-0">
                                                        <span>3.27%</span>
                                                    </h3>
                                                </div>
                                                <div class="col">
                                                    <p class="text-muted mt-3">Customers</p>
                                                    <h3 class=" mb-0">
                                                        <span>3k</span>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>

                                    </div>  end card-body
                                </div>  end card
                            </div> end col
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-widgets">
                                            <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                            <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button" aria-expanded="false" aria-controls="yearly-sales-collapse"><i class="ri-subtract-line"></i></a>
                                            <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                        </div>
                                        <h5 class="header-title mb-0">Yearly Sales Report</h5>

                                        <div id="yearly-sales-collapse" class="collapse pt-3 show">
                                            <div dir="ltr">
                                                <div id="yearly-sales-chart" class="apex-charts" data-colors="#3bc0c3,#1a2942,#d1d7d973"></div>
                                            </div>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <p class="text-muted mt-3 mb-2">Quarter 1</p>
                                                    <h4 class="mb-0">$56.2k</h4>
                                                </div>
                                                <div class="col">
                                                    <p class="text-muted mt-3 mb-2">Quarter 2</p>
                                                    <h4 class="mb-0">$42.5k</h4>
                                                </div>
                                                <div class="col">
                                                    <p class="text-muted mt-3 mb-2">All Time</p>
                                                    <h4 class="mb-0">$102.03k</h4>
                                                </div>
                                            </div>
                                        </div>

                                    </div>  end card-body
                                </div>  end card

                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h4 class="fs-22 fw-semibold">69.25%</h4>
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> US Dollar Share</p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div id="us-share-chart" class="apex-charts" dir="ltr"></div>
                                            </div>
                                        </div>
                                    </div>end card body 
                                </div>  end card
                            </div> end col

                        </div>
                        end row -->

                        <div class="row">
                            <!-- <div class="col-xl-4">
                                 Chat
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="p-3">
                                            <div class="card-widgets">
                                                <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                                <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button" aria-expanded="false" aria-controls="yearly-sales-collapse"><i class="ri-subtract-line"></i></a>
                                                <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                            </div>
                                            <h5 class="header-title mb-0">Chat</h5>
                                        </div>
    
                                        <div id="yearly-sales-collapse" class="collapse show">
                                            <div class="chat-conversation mt-2">
                                                <div class="card-body py-0 mb-3" data-simplebar style="height: 322px;">
                                                    <ul class="conversation-list">
                                                        <li class="clearfix">
                                                            <div class="chat-avatar">
                                                                <img src="assets/images/users/avatar-5.jpg" alt="male">
                                                                <i>10:00</i>
                                                            </div>
                                                            <div class="conversation-text">
                                                                <div class="ctext-wrap">
                                                                    <i>Geneva</i>
                                                                    <p>
                                                                        Hello!
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="clearfix odd">
                                                            <div class="chat-avatar">
                                                                <img src="assets/images/users/avatar-1.jpg" alt="Female">
                                                                <i>10:01</i>
                                                            </div>
                                                            <div class="conversation-text">
                                                                <div class="ctext-wrap">
                                                                    <i>Thomson</i>
                                                                    <p>
                                                                        Hi, How are you? What about our next meeting?
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="clearfix">
                                                            <div class="chat-avatar">
                                                                <img src="assets/images/users/avatar-5.jpg" alt="male">
                                                                <i>10:01</i>
                                                            </div>
                                                            <div class="conversation-text">
                                                                <div class="ctext-wrap">
                                                                    <i>Geneva</i>
                                                                    <p>
                                                                        Yeah everything is fine
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="clearfix odd">
                                                            <div class="chat-avatar">
                                                                <img src="assets/images/users/avatar-1.jpg" alt="male">
                                                                <i>10:02</i>
                                                            </div>
                                                            <div class="conversation-text">
                                                                <div class="ctext-wrap">
                                                                    <i>Thomson</i>
                                                                    <p>
                                                                        Wow that's great
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <form class="needs-validation" novalidate name="chat-form" id="chat-form">
                                                        <div class="row align-items-start">
                                                            <div class="col">
                                                                <input type="text" class="form-control chat-input" placeholder="Enter your text" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter your messsage
                                                                </div>
                                                            </div>
                                                            <div class="col-auto d-grid">
                                                                <button type="submit" class="btn btn-danger chat-send waves-effect waves-light">Send</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
        
                                            </div>  end .chat-conversation
                                        </div>
                                    </div>
                                    
                                </div>  end card
                            </div> end col -->

                            <div class="col-xl-12">
                                <!-- Todo-->
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="p-3">
                                            <!-- <div class="card-widgets">
                                                <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                                <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button" aria-expanded="false" aria-controls="yearly-sales-collapse"><i class="ri-subtract-line"></i></a>
                                                <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                            </div> -->
                                            <h5 class="header-title mb-0">Last 10 Recoeds</h5>
                                        </div>
    
                                        <div id="yearly-sales-collapse" class="collapse show">
    
                                            <div class="table-responsive">
                                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                        <th> S.No </th>
                                            <?php 
                                            $form_table_attributes = $_SESSION['form_table_attributes'];
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
                                        if (mysqli_num_rows($result_form_table) > 0) {
                                            $sn=1;
                                            while($data = mysqli_fetch_assoc($result_form_table)) {
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