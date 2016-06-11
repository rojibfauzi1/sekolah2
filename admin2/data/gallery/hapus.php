<?php
include '../conf/connect.php';
$q = $conn->query("SELECT * FROM galeri WHERE id_galeri='$_GET[id]'");
$cek = $q->fetch_assoc();
$folder = "../upload/gallery/$cek[gambar]";
if(file_exists($folder)){
	unlink($folder);
	header("location: ?p=gallery");
}



$s = "DELETE FROM gallery WHERE id_galeri='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=gallery");
}
?>