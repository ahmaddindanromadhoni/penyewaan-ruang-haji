<?php
    session_start();
    if($_SESSION['status_login'] != true){
        echo'<script>window.location="index.php"</script>';
    }
    ?>
   <!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="../../assets/css/sb-admin-2.min.css" rel="stylesheet">

                <title>Penyewaan Ruang</title>
      </head>
      <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container">
      <a class="navbar-brand" href="beranda.php">Aplikasi Penyawaan Ruang</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <strong><a class="nav-link active" href="beranda.php">Beranda</a></strong>
          <strong><a class="nav-link active" href="logout.php">Logout</a></strong>
        </div>
        </div>
      </div>
    </nav>

            <div class="container">     
            <h3 class="mt-3">Aplikasi Penyewaan Ruang</h3>
          </div>
          <hr>

          <div class="container">
      <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tgl Pesan</th>                           
                                <th>Uang</th>                           
                                <th>No Rekening</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include'koneksi.php';
                                $no = 1;
                                $no_pesan = $_GET['id'];
                                $data = mysqli_query($koneksi,"SELECT * FROM pesan LEFT JOIN user USING (id_user) WHERE no_pesan='$no_pesan'");
                                while ($d = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $d['nama_user'];?></td>
                                <td><?php echo $d['tgl_pesan'];?></td>
                                <td><?php echo number_format($d['uang']) ;?></td>
                                <td><?php echo $d['no_rekening'];?></td>
                                <td><?php echo ($d['status'] == 0)? 'Pending':'Selesai';?></td>
                            </tr>
                            <?php
                                }
                            ?> 
                            </tbody>
                            <script>
                                window.print();
                            </script>
                        </table>
      </div>
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        -->
      </body>
    </html>