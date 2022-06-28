<?php
include '../koneksi.php';
function upload() {
$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['gambar_ruang']['name'];
$ukuran = $_FILES['gambar_ruang']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
	header("location:ruangan.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 10440700){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['nama_ruangan']['tmp_name'], './ruang/'.$rand.'_'.$filename);
	}
}
}

include '../koneksi.php';
$kd_ruang = $_POST['kd_ruang'];
$nama_gedung = htmlspecialchars($_POST['nama_gedung']);
$nama_ruangan = htmlspecialchars($_POST['nama_ruangan']);
$cont_person = htmlspecialchars($_POST['cont_person']);
$tlp_person = htmlspecialchars($_POST['tlp_person']);
$tarif_biasa = htmlspecialchars($_POST['tarif_biasa']);
$tarif_kerjasama = htmlspecialchars($_POST['tarif_kerjasama']);
$fasilitas = htmlspecialchars($_POST['fasilitas']);
$gambarLama = htmlspecialchars($_POST['gambarLama']);

// Cek Apakah Ada Gambar Baru atau Tidak
if( $_FILES['gambar_ruang']['error'] === 4 ) {
	$gambar_ruang = $gambarLama;
} else {
	$gambar_ruang = upload();
}
$query = mysqli_query($koneksi,"UPDATE ruangan SET nama_gedung='$nama_gedung', nama_ruangan='$nama_ruangan', cont_person='$cont_person', tlp_person='$tlp_person', tarif_biasa='$tarif_biasa', tarif_kerjasama='$tarif_kerjasama', fasilitas='$fasilitas'  WHERE kd_ruang='$kd_ruang'");
if($query) {
	echo "
	<script>
	alert('Data Berhasil Diubah');
	document.location.href = 'ruangan.php';
	</script>
	";
} else {
	echo "<script>
	alert('Data Gagal Diubah');
	document.location.href = 'update_ruang.php';
	</script>";
}

 ?>