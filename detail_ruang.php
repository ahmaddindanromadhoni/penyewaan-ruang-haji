<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
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
    <h3 class="mt-3">Detail Ruang</h3>
</div>
<hr>

    <section class="content">
      <div class="container">
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">
            <div class="text-right">
            <a href="beranda.php" class="btn btn-sm btn-warning">Kembali <i class="fa fa-arrow-circle-right"></i></a>
            </div>
              <!-- TO DO List -->
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                  <div class="box-tools pull-right">
                
                  </div> 
                </div><!-- /.box-header -->
                <?php
                include 'koneksi.php';
                $kd_ruang = $_GET['id'];
                $ruang = mysqli_query($koneksi,"SELECT * FROM ruangan LEFT JOIN gedung USING (kd_gedung) WHERE kd_ruang='$kd_ruang'");
                $r = mysqli_fetch_array($ruang)
                ?>
                <div class="box-body">
                  <div class="form-panel">
                  <table id="example" class="table table-hover table-bordered">
                      <tr>
                      <td>Nama Gedung</td>
                      <td><?php echo $r['nama_gedung']; ?></td>
                      </tr>
                      <tr>
                      <td width="250">Nama Ruangan</td>
                      <td width="700" colspan="1"><?php echo $r['nama_ruangan']; ?></td>
                      </tr>
                      <tr>
                      <td>Cont Person</td>
                      <td><?php echo $r['cont_person']; ?></td>
                      </tr>
                      <tr>
                      <td>Tlp Person</td>
                      <td>+62<?php echo $r['tlp_person']; ?></td>
                      </tr>
                      <tr>
                      <td>Tarif Biasa</td></td>
                      <td>Rp.<?php echo number_format($r['tarif_biasa']); ?></td>
                      </tr>
                      <tr>
                      <td>Tarif Kerjasama</td>
                      <td>Rp.<?php echo number_format($r['tarif_kerjasama']); ?></td>
                      </tr>
                      <tr>
                      <td>Fasilitas</td>
                      <td><?php echo $r['fasilitas']; ?></td>
                    </tr>
                      <tr>
                      <td>Gambar Ruang</td></td>
                      <td><img src="admin/ruang/<?php echo $r['gambar_ruang']; ?>" width="40%"></td>
                      </tr>
                      </table>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
            </section>

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