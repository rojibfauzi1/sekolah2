<?php
include '../conf/koneksi.php';




$s = "DELETE FROM kategorinilai WHERE kd_kategorinilai='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=kategorinilai");
}
?>