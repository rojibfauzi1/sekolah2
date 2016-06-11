<?php
include '../conf/connect.php';
$q = $conn->query("SELECT * FROM admin WHERE id_admin='$_GET[id]'");
$cek = $q->fetch_assoc();
$folder = "../upload/admin/$cek[gambar]";
if(file_exists($folder)){
	unlink($folder);
	header("location: ?p=admin");
}

$s = "DELETE FROM admin WHERE id_admin='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	header("location: ?p=admin");
}
?>