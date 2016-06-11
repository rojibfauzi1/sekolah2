<?php
include '../conf/koneksi.php';
$sql1 = $conn->query("SELECT * FROM admin WHERE kd_admin='$_GET[id]'");
$cek = $sql1->fetch_assoc();
$folder = "../upload/admin/$cek[foto]";
if(file_exists($folder)){
	unlink($folder);
	header('location: ?p=admin');
}



$s = "DELETE FROM admin WHERE kd_admin='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=admin");
}
?>