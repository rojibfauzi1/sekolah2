<?php
/*$selectIdMax = $conn->query("SELECT max(kd_siswa) as maxIdSiswa FROM siswa where kd_siswa like 'S%'");
  $hslIdMax = $selectIdMax->fetch_assoc();
  $idMax = $hslIdMax['maxIdSiswa'];

  $nourut = (int)substr($idMax, 1,2);
  $nourut++;
  $idBaru = "S".sprintf("%03s",$nourut);*/

$maxId = $conn->query("SELECT MAX(kd_tahun) AS max_id FROM tahun");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "T"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);

?>
<div class="judul">
  <h2>Tambah Tahun</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=tambahtahun">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Tahun</label>
    <input type="number" required name="tahun" class="form-control" placeholder="Tahun">
  </div>

  <div class="form-group">
    <label for="nama">Mulai</label>
    <input type="text" id="datepicker1" required name="mulai" class="form-control" placeholder="Mulai">
  </div>
  <div class="form-group">
    <label for="nama">Akhir</label>
    <input type="text" id="datepicker" required name="akhir" class="form-control" placeholder="Akhir">
  </div>
 
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Tahun</button>
</form>
<div class="clear" style="clear:both;"></div>

<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $tahun = $_POST['tahun'];

  $mulai = date('Y-m-d',strtotime($_POST['mulai']));
  $akhir = date('Y-m-d',strtotime($_POST['akhir']));
 
$cek = "SELECT * FROM tahun where kd_tahun='$id'";
$sql = $conn->query($cek);
 if($sql->num_rows > 0){
$maxId = $conn->query("SELECT MAX(kd_tahun) AS max_id FROM tahun");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "T"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);

   $sql = "INSERT INTO tahun VALUES ('$id','$tahun','$mulai','$akhir')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=tahun");
  }
}else{ 

   $sql = "INSERT INTO tahun VALUES ('$id','$tahun','$mulai','$akhir')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=tahun");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

