<?php
include '../conf/koneksi.php';




$s = "DELETE FROM nilai WHERE kd_nilai='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=nilai");
}
?>