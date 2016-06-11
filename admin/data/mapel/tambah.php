<?php
/*$selectIdMax = $conn->query("SELECT max(kd_siswa) as maxIdSiswa FROM siswa where kd_siswa like 'S%'");
  $hslIdMax = $selectIdMax->fetch_assoc();
  $idMax = $hslIdMax['maxIdSiswa'];

  $nourut = (int)substr($idMax, 1,2);
  $nourut++;
  $idBaru = "S".sprintf("%03s",$nourut);*/

$maxId = $conn->query("SELECT MAX(kd_mapel) AS max_id FROM mapel");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "M"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);
function tampil_jurusan(){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM jurusan ";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_jurusan']."'>".$row['nama_jurusan']."</option>";
  }
}
?>
<div class="judul">
  <h2>Tambah Mata Pelajaran</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=tambahmapel">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Mata Pelajaran</label>
    <input type="text" required name="nama" class="form-control" placeholder="Nama Mata Pelajaran">
  </div>

<div class="form-group">
    <label for="nama">Jurusan</label><br/>
    <select name="jurusan" class="form-control">
      <?php tampil_jurusan(); ?>
    </select>
  </div>

 
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Mata Pelajaran</button>
</form>
<div class="clear" style="clear:both;"></div>

<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $nama = $_POST['nama'];

  $jurusan = $_POST['jurusan'];

 
$cek = "SELECT * FROM mapel where kd_mapel='$id'";
$sql = $conn->query($cek);
 if($sql->num_rows > 0){
$maxId = $conn->query("SELECT MAX(kd_mapel) AS max_id FROM mapel");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "M"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);

   $sql = "INSERT INTO mapel VALUES ('$id','$nama','$jurusan')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=mapel");
  }
}else{ 

$sql = "INSERT INTO mapel VALUES ('$id','$nama','$jurusan')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=mapel");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

