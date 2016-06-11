<?php
/*$selectIdMax = $conn->query("SELECT max(kd_siswa) as maxIdSiswa FROM siswa where kd_siswa like 'S%'");
  $hslIdMax = $selectIdMax->fetch_assoc();
  $idMax = $hslIdMax['maxIdSiswa'];

  $nourut = (int)substr($idMax, 1,2);
  $nourut++;
  $idBaru = "S".sprintf("%03s",$nourut);*/

$maxId = $conn->query("SELECT MAX(kd_jurusan) AS max_id FROM jurusan");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "J"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);

?>
<div class="judul">
  <h2>Tambah Jurusan</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=tambahjurusan">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Jurusan</label>
    <input type="text" required name="nama" class="form-control" placeholder="Nama Jurusan">
  </div>

  <div class="form-group">
    <label for="nama">Keterangan</label>
    <input type="text" required name="keterangan" class="form-control" placeholder="Keterangan">
  </div>

 
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Keterangan</button>
</form>
<div class="clear" style="clear:both;"></div>

<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $nama = $_POST['nama'];

  $keterangan = $_POST['keterangan'];

 
$cek = "SELECT * FROM jurusan where kd_jurusan='$id'";
$sql = $conn->query($cek);
 if($sql->num_rows > 0){
$maxId = $conn->query("SELECT MAX(kd_jurusan) AS max_id FROM jurusan");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "J"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);

   $sql = "INSERT INTO jurusan VALUES ('$id','$nama','$keterangan')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=jurusan");
  }
}else{ 

   $sql = "INSERT INTO jurusan VALUES ('$id','$nama','$keterangan')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=jurusan");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

