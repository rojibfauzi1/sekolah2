<?php
include '../conf/koneksi.php';
$s = "DELETE FROM kritikdaran WHERE id_kritiksaran='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	header("location: ?p=kritiksaran");
}
?>