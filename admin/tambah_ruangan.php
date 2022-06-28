<?php 
include '../koneksi.php';
$nama_gedung = $_POST['nama_gedung'];
$nama_ruangan = $_POST['nama_ruangan'];
$cont_person = $_POST['cont_person'];
$tlp_person = $_POST['tlp_person'];
$tarif_biasa = $_POST['tarif_biasa'];
$tarif_kerjasama = $_POST['tarif_kerjasama'];
$fasilitas = $_POST['fasilitas'];

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['gambar_ruang']['name'];
$ukuran = $_FILES['gambar_ruang']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
	header("location:insert_ruangan.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 10440700){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['gambar_ruang']['tmp_name'], './ruang/'.$rand.'_'.$filename);
		mysqli_query($koneksi, "INSERT INTO ruangan  VALUES('','$nama_gedung','$nama_ruangan','$cont_person','$tlp_person','$tarif_biasa','$tarif_kerjasama','$xx','$fasilitas')");
		header("location:insert_ruangan.php?alert=berhasil");
	}else{
		header("location:insert_ruangan.php?alert=gagal_ukuran");
	}
}
?>