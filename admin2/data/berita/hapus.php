<?php
include '../conf/connect.php';
$q = $conn->query("SELECT * FROM berita WHERE id_berita='$_GET[id]'");
$cek = $q->fetch_assoc();
$folder = "../upload/berita/$cek[gambar]";
if(file_exists($folder)){
	unlink($folder);
	header("location: ?p=berita");
}



$s = "DELETE FROM berita WHERE id_berita='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=berita");
}
?>