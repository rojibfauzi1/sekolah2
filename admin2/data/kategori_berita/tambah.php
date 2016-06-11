<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $nama = $_POST['nama'];

$cek = "SELECT * FROM kategori where id_kategori='$id'";
$sql = $conn->query($cek);
 if($sql->num_rows > 0){
$maxId = $conn->query("SELECT MAX(id_kategori) AS max_id FROM kategori");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "K"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);


 $sql = "INSERT INTO kategori VALUES ('$id','$nama')";
  $s = $conn->query($sql);
  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=kategori");
  }
}else{

  $sql = "INSERT INTO kategori VALUES ('$id','$nama')";
  $s = $conn->query($sql);
  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=kategori");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

