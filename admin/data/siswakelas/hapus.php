<?php
include '../conf/koneksi.php';




$s = "DELETE FROM wali WHERE kd_wali='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=wali");
}
?>