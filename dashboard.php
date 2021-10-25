<?php
require_once("admin/library.php");
$call = new admin;
if(!isset($_SESSION["username"])){
    header("Location:index.php");
}
$hari =  (isset($_GET["hari"]) ? $_GET["hari"] : date("d"));
$bulan = (isset($_GET["bulan"]) ? $_GET["bulan"] : date("M"));
$tahun = (isset($_GET["tahun"]) ? $_GET["tahun"] : date("Y"));
$waktu = strtotime($hari.''.$bulan.''.$tahun);
$waktu = date("Y-m-d",$waktu);
$end_hari = date("t", strtotime($waktu));

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

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
                <a class="nav-link" href="">
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
                        <a class="collapse-item" href="tables.php">Tabel user</a>
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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["username"]?></span>
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
                    <h1 class="h3 mb-2 text-gray-800">Harga Pasar hari ini</h1>
               
                    <div class="card">

                        <h5 class="card-header float-left text-primary ">
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#insertharga">
                                Tambah Data
                            </button>

                         

                            <div class="float-left">
                                <h4>Penentuan harga</h4>
                            </div>
                           
                            <div class="form-group float-left ml-2">
                            <form method="GET" action="">
                                <select id="inputState" class="form-control" name="hari">
                                <?php for($a = 1; $a <= $end_hari; $a++){?>
                                  <option <?php if($a == $hari) echo "selected"?>><?php echo $a?></option>
                                <?php }?>
                                </select>
                                
                            </div>

                            <div class="form-group float-left ml-2">
                           
                           
                                <select id="inputState" name="bulan" class="form-control">
                                <?php   $months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul ", "Aug", "Sep", "Oct", "Nov", "Dec"];
                                        $count_months = count($months) - 1;
                                        for($a = 0; $a <= $count_months; $a++){?>
                                    <option <?php if($months[$a] == $bulan) echo "selected";?>><?php echo $months[$a];?></option>
                                    <?php } ?>     
                                </select>

                            </div>

                            <div class="form-group float-left ml-2">
            
                                <select id="inputState" class="form-control" name="tahun">
                                 <?php for($a = 2020; $a <= $tahun; $a++){?>
                                  <option <?php if($a == $tahun) echo "selected";?>><?php echo $a;?></option>
                                  <?php }?>
                                </select>

                            </div>
                            
                            <button type="submit" class="btn btn-primary float-left ml-2" >
                                Submit
                            </button>
                            </form>
                        </h5>
                        
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered"  width="100%" cellspacing="0">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Harga Pasar</th>
                                    <th>Harga pribadi</th>
                                    <th>Biaya Operasional</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php if($call->harga_data($waktu) == false){
                                    echo "<tr>
                                    <td colspan = 7> Tidak ada data hari ini</td>
                                    </tr>";
                                }else{ ?>

                             
                                <?php foreach($call->ini_harga($waktu) as $key => $val){
                                    $tanggal = strtotime($val["waktu"]);
                                    $tanggal = date("d-M-Y",$tanggal);
                                    $tanggal = str_replace("-"," ", $tanggal);
                                    ?>
                                <tr>
                                    <td><?php echo $tanggal;?></td>
                                    <td><?php echo "Rp.".' '.number_format($val["harga_pasar"]);?></td>
                                    <td><?php echo "Rp.".' '.number_format($val["harga_pribadi"]);?></td>
                                    <td><?php echo "Rp.".' '.number_format($val["biaya"]);?></td>
                                    <td>
                                        <button data-toggle="modal" data-target="#editharga" class="btn btn-primary col-sm-5">Edit</button>
                                        <button  data-toggle="modal"  class="btn btn-danger col-sm-5"data-href="admin/delete_harga.php?id=<?php echo $val["id"]?>" data-toggle="modal" data-target="#confirm-delete">Delete</button>
                                    </td>
                                </tr>
                                
                    <!-- Delete Modal -->
                    <div class="modal fade" id="editharga" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            Confirmation
                                        </div>
                                        <div class="modal-body">
                                        <form method="POST" action="admin/ubah_harga.php">
                                            <input type="hidden" name="id" id="id" value="<?php echo $val["id"]?>">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Harga pasar</label>
                                                <input type="text" class="form-control"  name="pasar" value="<?php echo $val["harga_pasar"]?>" aria-describedby="emailHelp" placeholder="Enter username">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Harga pribadi</label>
                                                <input type="text" class="form-control"  name="pribadi" value="<?php echo $val["harga_pribadi"]?>" placeholder="No Telephone">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Biaya operasional</label>
                                                <input type="text" class="form-control"  name="biaya" value="<?php echo $val["biaya"]?>" placeholder="No Telephone">
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
                                </div>
                            </div>
                                <?php  
                                }
                            } ?>
                            </table>
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

                    <!-- Modal -->
                    <div class="modal fade" id="insertharga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                            <form method="POST" action="admin/insert_harga.php">
                        
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1" name="tanggal" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Harga Pasar</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="pasar" aria-describedby="emailHelp" placeholder="Masukkan harga pasar">
                                </div>
    
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Harga Pribadi</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="pribadi" placeholder="Masukkan harga pribadi">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Biaya operasional</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="biaya" placeholder="Masukkan harga biaya operasional">
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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>




    <script>

    $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
            });

    </script>
</body>

</html>