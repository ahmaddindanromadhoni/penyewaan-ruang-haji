<?php
include'koneksi.php';
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
        <form action="C_sewa.php" method="POST">
        <div class="item form-group">
          <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Ruang</label>
          <div class="col-md-6 col-sm-6 ">
          <?php
                include'koneksi.php';
                $kd_ruang = $_GET['id'];
                $ruang = mysqli_query($koneksi,"SELECT * FROM ruangan WHERE kd_ruang='$kd_ruang'");
                while($r = mysqli_fetch_array($ruang)){
		        ?>
            <input type="text" class="form-control" name="nama_ruangan" value="<?php echo $r['nama_ruangan'];?>" readonly>
                  
                <?php } ?>
          </div>
        </div>
       
        <div class="item form-group">
          <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Pesan</label>
          <div class="col-md-6 col-sm-6 ">
            <input type="date" class="form-control" name="tgl_dipesan" required>
          </div>
        </div>
        <div class="item form-group">
          <label class="col-form-label col-md-3 col-sm-3 label-align">Lama Hari</label>
          <div class="col-md-6 col-sm-6 ">
          <input type="number" class="form-control" name="lama" id="lama" required>
          </div>
        </div><div class="item form-group">
          <label class="col-form-label col-md-3 col-sm-3 label-align">Harga Sewa</label>
          <div class="col-md-6 col-sm-6 ">
          <?php
                include 'koneksi.php';
                $kd_ruang = $_GET['id'];
                $ruang = mysqli_query($koneksi,"SELECT * FROM ruangan WHERE kd_ruang='$kd_ruang'");
                while ($r = mysqli_fetch_array($ruang)){
		        ?>
            <input type="text" class="form-control" name="harga_sewa" id="harga_sewa" value="<?= $r['tarif_biasa'];?>" readonly>
            <?php } ?>
          </div>
        </div>
        <div class="item form-group">
          <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Harga</label>
          <div class="col-md-6 col-sm-6 ">
            <input type="text" class="form-control" name="jumlah_harga" id="jumlah" readonly>
          </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript">
        $(".item").keyup(function(){
          var lama = parseInt($("#lama").val())
          var harga_sewa = parseInt($("#harga_sewa").val())
          var jumlah = lama * harga_sewa;
          $("#jumlah").attr("value",jumlah)
        });
        </script>
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