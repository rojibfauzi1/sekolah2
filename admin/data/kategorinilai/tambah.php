<?php
/*$selectIdMax = $conn->query("SELECT max(kd_siswa) as maxIdSiswa FROM siswa where kd_siswa like 'S%'");
  $hslIdMax = $selectIdMax->fetch_assoc();
  $idMax = $hslIdMax['maxIdSiswa'];

  $nourut = (int)substr($idMax, 1,2);
  $nourut++;
  $idBaru = "S".sprintf("%03s",$nourut);*/

$maxId = $conn->query("SELECT MAX(kd_kategorinilai) AS max_id FROM kategorinilai");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "K"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);

?>
<div class="judul">
  <h2>Tambah Kategori Nilai</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=tambahkategorinilai">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Jenis Nilai</label>
    <input type="text" required name="jenis" class="form-control" placeholder="Jenis Nilai">
  </div>

  <div class="form-group">
    <label for="nama">Keterangan</label>
    <input type="text" required name="keterangan" class="form-control" placeholder="Keterangan">
  </div>

 
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Kategori Nilai</button>
</form>
<div class="clear" style="clear:both;"></div>

<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $jenis = $_POST['jenis'];

  $keterangan = $_POST['keterangan'];

 
$cek = "SELECT * FROM kategorinilai where kd_kategorinilai='$id'";
$sql = $conn->query($cek);
 if($sql->num_rows > 0){
$maxId = $conn->query("SELECT MAX(kd_kategorinilai) AS max_id FROM kategorinilai");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "O"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);

   $sql = "INSERT INTO kategorinilai VALUES ('$id','$jenis','$keterangan')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=kategorinilai");
  }
}else{ 

   $sql = "INSERT INTO kategorinilai VALUES ('$id','$jenis','$keterangan')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=kategorinilai");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

