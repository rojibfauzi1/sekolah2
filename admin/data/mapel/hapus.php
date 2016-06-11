<?php
include '../conf/koneksi.php';




$s = "DELETE FROM mapel WHERE kd_mapel='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=mapel");
}
?>