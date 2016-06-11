<?php
include '../conf/koneksi.php';
$q = $conn->query("SELECT * FROM paket_wisata WHERE id_paket='$_GET[id]'");
$cek = $q->fetch_assoc();
$folder = "../upload/paket/$cek[gambar]";
if(file_exists($folder)){
	unlink($folder);
	header("location: ?p=paket_wisata");
}




$s = "DELETE FROM paket_wisata WHERE id_paket='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=paket_wisata");
}
?>