<?php
include '../conf/koneksi.php';




$s = "DELETE FROM berita WHERE kd_berita='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=berita");
}
?>