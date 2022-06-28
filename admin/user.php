<?php
    session_start();
    if($_SESSION['status_login'] != true){
        echo'<script>window.location="login.php"</script>';
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

    <title>Aplikasi Penyewaan Ruang</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
        <!-- Custom styles for this page -->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Penyewaan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user.php">
                    <i class="fas fa-user-edit"></i>
                    <span>Data User</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-clipboard"></i>
                    <span>Ruang</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="insert_ruangan.php">Input Ruang</a>
                        <a class="collapse-item" href="ruangan.php">Data Ruang</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-home"></i>
                    <span>Gedung</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="insert_gedung.php">Input Gedung</a>
                        <a class="collapse-item" href="gedung.php">Data Gedung</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="pemesanan.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Pemesanan</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="pelunasan.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Pelunasan</span></a>
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

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['a_global']->nama_user ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data User</h1>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data User</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>                           
                                        <th>Tlp</th>                           
                                        <th>Email</th>
                                        <th>Komunitas</th>
                                        <th>Opsi</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                        <tbody>
                                            <?php
                                            include'../koneksi.php';
                                            $no = 1;
                                            $data = mysqli_query($koneksi,"SELECT * FROM user ORDER BY id_user DESC");
                                            while ($d = mysqli_fetch_array($data)) {
                                            ?>
                                            <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $d['nama_user'];?></td>
                                            <td><?php echo $d['alamat_user'];?></td>
                                            <td><?php echo $d['tlp_user'];?></td>
                                            <td><?php echo $d['email_user'];?></td>
                                            <td><?php echo $d['komunitas'];?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal<?= $d['id_user'] ?>">
                                                <i class="fas fa-eye"></i>
                                                </button>
                                                <a class="btn btn-success btn-sm" href="update.php?id_user=<?php echo $d['id_user'];?>"><i class="fas fa-edit"></i></a>
                                            </td>
                                            </tr>
                                             <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?= $d['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail Data User</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <form>
                                              <div class="row">
                                                <div class="col-sm-12">
                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Nama:</label>
                                                    <input type="text" class="form-control" id="recipient-name" value="<?= $d['nama_user']; ?>" readonly>
                                                  </div>
                                                </div>
                                                <div class="col-sm-12">
                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Alamat:</label>
                                                    <input type="text" class="form-control" id="recipient-name" value="<?= $d['alamat_user']; ?>" readonly>
                                                  </div>
                                                </div>
                                                <div class="col-sm-12">
                                                  <div class="row">
                                                    <div class="form-group col-sm-6">
                                                      <label for="recipient-name" class="col-form-label">Tlp User :</label>
                                                      <input type="text" class="form-control" id="recipient-name" value="<?= $d['tlp_user'] ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                      <label for="recipient-name" class="col-form-label">Email :</label>
                                                      <input type="text" class="form-control" id="recipient-name" value="<?= $d['email_user'] ?>" readonly>
                                                    </div>
                                                  </div>
                                                </div>

                                                <div class="col-sm-12">
                                                  <div class="row">
                                                    <div class="form-group col-sm-6">
                                                      <label for="recipient-name" class="col-form-label">Password :</label>
                                                      <input type="text" class="form-control" id="recipient-name" value="<?php echo $d['password'];?>" readonly>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                      <label for="recipient-name" class="col-form-label">Nama Komunitas :</label>
                                                      <input type="text" class="form-control" id="recipient-name" value="<?php echo $d['komunitas'] ?>" readonly>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-12">
                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Alamat Komunitas :</label>
                                                    <input type="text" class="form-control" id="recipient-name" value="<?= $d['alamat_komunitas'] ?>" readonly>
                                                  </div>
                                                </div>
                                                <div class="col-sm-12">
                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Tlp Komunitas :</label>
                                                    <input type="text" class="form-control" id="recipient-name" value="<?= $d['tlp_komunitas'] ?>" readonly>
                                                  </div>
                                                </div>
                                                <div class="col-sm-12">
                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Email Komunitas :</label>
                                                    <input type="text" class="form-control" id="recipient-name" value="<?= $d['email_komunitas'] ?>" readonly>
                                                  </div>
                                                </div>

                                              </div>
                                            </form>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- modal -->
                                            <?php
                                            }
                                            ?> 
                                    </tbody>
                                    </tfoot>
                                </table>
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/vendor/chart.js/Chart.min.js"></script>
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>
    <script src="../assets/js/demo/chart-area-demo.js"></script>
    <script src="../assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>