<?php
include '../conf/koneksi.php';
$q = $conn->query("SELECT * FROM guru WHERE kd_guru='$_GET[id]'");
$cek = $q->fetch_assoc();
$folder = "../upload/guru/$cek[foto]";
if(file_exists($folder)){
	unlink($folder);
	header("location: ?p=guru");
}



$s = "DELETE FROM guru WHERE kd_guru='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=guru");
}
?>