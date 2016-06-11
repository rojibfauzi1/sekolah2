<?php
include '../conf/koneksi.php';
$q = $conn->query("SELECT * FROM siswa WHERE kd_siswa='$_GET[id]'");
$cek = $q->fetch_assoc();
$folder = "../upload/siswa/$cek[foto]";
if(file_exists($folder)){
	unlink($folder);
	header("location: ?p=siswa");
}



$s = "DELETE FROM siswa WHERE kd_siswa='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=siswa");
}
?>