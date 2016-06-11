<?php
include '../conf/koneksi.php';




$s = "DELETE FROM jurusan WHERE kd_jurusan='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=jurusan");
}
?>