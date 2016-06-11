<?php
include '../conf/koneksi.php';




$s = "DELETE FROM kategoriberita WHERE kd_kategoriberita='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=kategoriberita");
}
?>