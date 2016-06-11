<?php
include '../conf/koneksi.php';




$s = "DELETE FROM kelas WHERE kd_kelas='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=kelas");
}
?>