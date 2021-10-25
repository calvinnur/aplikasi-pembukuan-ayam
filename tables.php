<?php 
require_once("admin/library.php");
$call = new admin;
if(!isset($_SESSION["username"])){
    header("Location:index.php");
}
$page = (isset($_GET["page"]) ? $_GET["page"] : '1');
$cari = null;
if(isset($_GET["cari"])){
    $cari = str_replace("'","",$_GET["cari"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <style>
        tr th{
            text-align: center;
        }
        tr td{
            text-align: center;
        }

    </style>

    <title>Tabel user</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/ayam.png">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-drumstick-bite"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Aplikasi Pembukuan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                F E A T U R E S
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tabel </span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Semua Tabel:</h6>
                        <a class="collapse-item" href="">Tabel user</a>
                        <a class="collapse-item" href="setoran.php">Tabel setoran pribadi</a>
                        <a class="collapse-item" href="pembukuan.php">Tabel pembukuan</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
            
                <a href="logout.php" class="nav-link"  >
                <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET" action="">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" name="cari" placeholder="Cari user"
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["username"];?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                           
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel user</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 mt-3">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary float-left">Tabel data user</h5>
                    
                <!-- Button trigger modal -->

                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#insertuser">
                    Tambah Data
                    </button>

                    <a href="admin/export_user.php" class="btn btn-primary float-right mr-2" >
                    <i class="far fa-file-excel"></i> Export Data
                    </a>

                <!-- Modal -->
                    <div class="modal fade" id="insertuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">

                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                        <form method="POST" action="admin/insert_user.php">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama User</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Enter username">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">No Telephone</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="phone" placeholder="No Telephone">
                            </div>
                          
        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                        </form>

                        </div>
                    </div>
                    </div>
                        </div>
     

                

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No Telephone</th>
                                    <th>Aksi</th>
                                </tr>
                            <?php 
                                 $index = 1;
                                 $pagination = $call->pagination("select * from user",$page,10);
                                  $total = $pagination["total_page"];
                                  $offset = $pagination["offset"];
                                  $limit = $pagination["limit"];
                                  $query = $call->querys("select * from user where username like '%$cari%' order by username asc limit $offset,$limit");
                                  $baris = mysqli_num_rows($query);
                                  if($baris < 1){
                                      echo "<tr>
                                      <td colspan=7 style='text-align:center;'>Tidak ada data yang tersedia</td>
                                      </tr>";
                                  }else{ ?>
                                <?php while($show = mysqli_fetch_assoc($query)) {
                                    
                                    ?>
                                <tr>
                                    <td><?php echo $index++?></td>
                                    <td><?php echo $show["username"]?></td>
                                    <td><?php echo $show["phone"]?></td>
                                    <td>
                                       <button type="button" class="btn btn-primary col-sm-4 " onclick="ubah_user(<?php echo $show['id']?>)" data-toggle="modal" data-target="#ubahuser" >Edit </button>
                                        <button class="btn btn-danger col-sm-4" data-href="admin/delete_user.php?id=<?php echo $show["id"]?>" data-toggle="modal" data-target="#confirm-delete">
                                           Delete
                                        </button>
                                    </td>
                                </tr>

                                <!-- Ubah  Modal -->
                            <div class="modal fade" id="ubahuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ubah user</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                            <form method="POST" action="admin/ubah_user.php">
                                <input type="hidden" name="id" id="id">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama User</label>
                                    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter username">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">No Telephone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="No Telephone">
                                </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </form>

                                </div>
                            </div>
                            </div>


                                <!-- Delete Modal -->
                                <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            Confirmation
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin untuk menghapus data ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <a class="btn btn-primary btn-ok">Confirm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <?php  
                                }
                        } ?>

                                </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination float-right mt-3">
                                <?php
                                for ($a = 1; $a <= $total; $a++) { ?>
                                    <?php if ($a == 1) { ?>
                                        <li class="page-item"><a class="page-link" href="tables.php?page=<?php echo $a;?>">First</a></li> 
                                    <?php } ?>
                                    <?php if ($a == $page) { ?>
                                    <li class="page-item <?php if($page == 1) echo 'active'?>"><a class="page-link" href="tables.php?page=<?php echo 1;?>"><?php echo 1?></a></li>
                                    <li class="page-item <?php if($page == 2) echo 'active'?>"><a class="page-link" href="tables.php?page=<?php echo 2;?>"><?php echo 2?></a></li>
                                    
                                    <?php } ?>
                                    <?php if ($a == $total) { ?>
                                        <li class="page-item "><a class="page-link" href="tables.php?page=<?php echo $a;?>">Last</a></li> 
                                    <?php } ?>
                                <?php } ?>
                                </ul>
                            </nav>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
                                    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script>

            $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
            });

            function ubah_user(id){
                $.ajax({
                    type : "POST",
                    url : "admin/data_user.php",
                    data : {
                        id : id
                    },
                    success : function(event){
                        var json = event;
                        $("#id").val(json[id].id);
                        $("#username").val(json[id].username);
                        $("#phone").val(json[id].phone);
                    }
                });
            }
        
    </script>
</body>

</html>