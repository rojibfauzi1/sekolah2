<?php
include '../conf/koneksi.php';




$s = "DELETE FROM tahun WHERE kd_tahun='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=tahun");
}
?>