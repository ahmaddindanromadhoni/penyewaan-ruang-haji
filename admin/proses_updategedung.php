<?php
include '../koneksi.php';
function upload() {
$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['gambar_gedung']['name'];
$ukuran = $_FILES['gambar_gedung']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
	header("location:data_gedung.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 10440700){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['gambar_gedung']['tmp_name'], './ruang/'.$rand.'_'.$filename);
	}
}
}

include '../koneksi.php';
$kd_gedung = $_POST['kd_gedung'];
$nama_gedung = htmlspecialchars($_POST['nama_gedung']);
$alamat_gedung = htmlspecialchars($_POST['alamat_gedung']);
$gambarLama = htmlspecialchars($_POST['gambarLama']);

// Cek Apakah Ada Gambar Baru atau Tidak
if( $_FILES['gambar_gedung']['error'] === 4 ) {
	$gambar_gedung = $gambarLama;
} else {
	$gambar_gedung = upload();
}
$query = mysqli_query($koneksi,"UPDATE gedung SET nama_gedung='$nama_gedung', alamat_gedung='$alamat_gedung', gambar_gedung='$gambar_gedung' WHERE kd_gedung='$kd_gedung'");
if($query) {
	echo "
	<script>
	alert('Data Berhasil Diubah');
	document.location.href ='gedung.php?databerhsildiubh';
	</script>
	";
} else {
	echo "
	<script>
	alert('Data Gagal Diubah');
	document.location.href='update_gedung.php?dtaggldiubh';
	</script>
	";
}

 ?>