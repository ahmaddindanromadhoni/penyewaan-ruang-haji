<?php
include'koneksi.php';
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

    <title>Aplikasi Penyawaan Ruang</title>
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
        <form action="Cek_pelunasan.php" method="POST">
            <!-- Nama -->
        <div class="item form-group">
          <label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
          <div class="col-md-6 col-sm-6 ">
            <input type="text" class="form-control" name="nama_user" value="<?php echo $_SESSION['a_global']->nama_user ?>" readonly>
          </div>
        </div>
        <!-- tgl pesan -->
        <div class="item form-group">
          <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Pesan</label>
          <div class="col-md-6 col-sm-6 ">
            <input type="date" class="form-control" name="tgl_pesan" >
          </div>
        </div>
        <!-- harga -->
        <div class="item form-group">
          <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Uang</label>
          <div class="col-md-6 col-sm-6 ">
             <?php
                    $no_pesan = $_GET['id'];
                    $pesan = mysqli_query($koneksi,"SELECT * FROM det_pesan WHERE no_pesan='$no_pesan'");
                    while ($r = mysqli_fetch_array($pesan)){
                ?>
            <input type="text" class="form-control" name="uang" value="<?= number_format($r['jumlah_harga']) ;?>" readonly>
            <?php } ?>
          </div>
        </div>
        <!-- No Rekening -->
        <div class="item form-group">
          <label class="col-form-label col-md-3 col-sm-3 label-align">No Rekening</label>
          <div class="col-md-6 col-sm-6 ">
            <input type="text" class="form-control" name="no_rekening" >
          </div>
        </div>
        <!-- button -->
        <div class="item form-group">
        <div class="col-md-6 col-sm-6">
        <button type="submit" class="btn btn-info">Simpan</button>
        </div>
        </div>
        </form>
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