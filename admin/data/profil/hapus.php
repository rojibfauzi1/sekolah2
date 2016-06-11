<?php
include '../conf/koneksi.php';




$s = "DELETE FROM profil WHERE kd_profil='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=profil");
}
?>