<?php
include("db.php");
$sql = "SELECT * FROM login WHERE status = '1'";
$result1 = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Matrix Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

</head>

<body>
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->

    <div id="main-wrapper">

        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">

                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>

                    <a class="navbar-brand" href="index.html">

                        <b class="logo-icon p-l-10">

                            <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />

                        </b>

                        <span class="logo-text">

                            <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" />

                        </span>

                    </a>

                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>


            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="ap.php" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Charts</span></a></li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Approval User</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <!--id:addnewtask-->
                            <table id="addnewtask" class="table table-striped table-bordered">
                                <thead>
                                    <tr>

                                        <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;"><b>
                                                <h5>S.No</h5>
                                            </b></th>
                                        <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;"><b>
                                                <h5>Name</h5>
                                            </b></th>
                                        <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;"><b>
                                                <h5>Email</h5>
                                            </b></th>
                                        <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;"><b>
                                                <h5>username</h5>
                                            </b></th>
                                        <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;"><b>
                                                <h5>password</h5>
                                            </b></th>

                                        <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;"><b>
                                                <h5>Action</h5>
                                            </b></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $s = 1;
                                    while ($row = mysqli_fetch_array($result1)) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $s ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['mail'] ?></td>
                                            <td><?php echo $row['username'] ?></td>
                                            <td><?php echo $row['password'] ?></td>

                                            <td>
                                                <button type="button" value="<?php echo $row['id'] ?>" class="btn btn-success userapprove"><i class="fas fa-check"></i></button>
                                                <button type="button" value="<?php echo $row['id']; ?>" class="btn btn-danger" data-toggle="modal" data-target="#rejectModal"><i class="fas fa-times"></i></button>
                                                                                                                                        
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    $s++
                                    ?>

                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>




            </div>

            <footer class="footer text-center">
                <h3>Developed By TIH</h3>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->

    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>

    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('#addnewtask').DataTable();
        });

        $(document).on('click', '.userapprove', function(e) {
            e.preventDefault();
            var id = $(this).val();
            console.log(id);
            if (confirm('Are you sure you want to approve the User ?')) {

            $.ajax({
                type: "POST",
                url: "backend.php",
                data: {
                    'approve_user': true,
                    'user_id': id
                },
                success:function(response){
                    var res = jQuery.parseJSON(response);
                    if(res.status == 500){
                        alert(res.message);
                    }
                    else{
                        Swal.fire({
                                title: "Approved!",
                                text: "USER APPROVED bY ADMINS",
                                icon: "success"
                            });
                            $('#addnewtask').load(location.href + " #addnewtask");
                    }
                }
            })
        }


        })
    </script>



</body>

</html>