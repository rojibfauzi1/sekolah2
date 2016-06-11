<?php
include '../conf/koneksi.php';




$s = "DELETE FROM gurumapel WHERE kd_gurumapel='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=gurumapel");
}
?>