<?php
/*$selectIdMax = $conn->query("SELECT max(kd_siswa) as maxIdSiswa FROM siswa where kd_siswa like 'S%'");
  $hslIdMax = $selectIdMax->fetch_assoc();
  $idMax = $hslIdMax['maxIdSiswa'];

  $nourut = (int)substr($idMax, 1,2);
  $nourut++;
  $idBaru = "S".sprintf("%03s",$nourut);*/

$maxId = $conn->query("SELECT MAX(kd_wali) AS max_id FROM wali");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "W"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);
function tampil_guru(){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM guru ";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_guru']."'>".$row['nama_guru']."</option>";
  }
}
function tampil_tahun(){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM tahun ";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_tahun']."'>".$row['tahun']."</option>";
  }
}
function tampil_kelas(){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM kelas ";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_kelas']."'>".$row['nama_kelas']."</option>";
  }
}
?>
<div class="judul">
  <h2>Tambah Wali</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=tambahwali">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  
<div class="form-group">
    <label for="nama">Guru</label><br/>
    <select name="guru" class="form-control">
      <?php tampil_guru(); ?>
    </select>
  </div>

<div class="form-group">
    <label for="nama">Tahun</label><br/>
    <select name="tahun" class="form-control">
      <?php tampil_tahun(); ?>
    </select>
  </div>  
<div class="form-group">
    <label for="nama">Kelas</label><br/>
    <select name="kelas" class="form-control">
      <?php tampil_kelas(); ?>
    </select>
  </div>

 
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Wali</button>
</form>
<div class="clear" style="clear:both;"></div>

<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $guru = $_POST['guru'];
  $tahun = $_POST['tahun'];
  $kelas = $_POST['kelas'];

 
$cek = "SELECT * FROM wali where kd_wali='$id'";
$sql = $conn->query($cek);
 if($sql->num_rows > 0){
$maxId = $conn->query("SELECT MAX(kd_wali) AS max_id FROM wali");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "W"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);

   $sql = "INSERT INTO wali VALUES ('$id','$guru','$tahun','$kelas')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=wali");
  }
}else{ 

 $sql = "INSERT INTO wali VALUES ('$id','$guru','$tahun','$kelas')";
 $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=wali");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

