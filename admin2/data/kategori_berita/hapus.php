<?php
include '../conf/connect.php';
$s = "DELETE FROM kategori WHERE id_kategori='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	header("location: ?p=kategori");
}
?>