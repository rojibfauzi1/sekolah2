<?php
/*$selectIdMax = $conn->query("SELECT max(kd_siswa) as maxIdSiswa FROM siswa where kd_siswa like 'S%'");
  $hslIdMax = $selectIdMax->fetch_assoc();
  $idMax = $hslIdMax['maxIdSiswa'];

  $nourut = (int)substr($idMax, 1,2);
  $nourut++;
  $idBaru = "S".sprintf("%03s",$nourut);*/

$maxId = $conn->query("SELECT MAX(kd_berita) AS max_id FROM berita");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "B"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);
function tampil_kategoriberita(){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM kategoriberita ";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_kategoriberita']."'>".$row['jenis_berita']."</option>";
  }
}
?>
<div class="judul">
  <h2>Tambah Berita</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=tambahberita">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Judul</label>
    <input type="text" required name="judul" class="form-control" placeholder="Judul">
  </div>

  <div class="form-group">
    <label for="nama">Isi</label>
    <textarea required name="isi" class="form-control"></textarea>
    
  </div>

  <div class="form-group">
    <label for="nama">Gambar</label>
    <input type="file" required name="gambar" class="form-control" accept="image/jpeg">
  </div>


<div class="form-group">
    <label for="nama">Jenis Berita</label><br/>
    <select name="kategori" class="form-control">
      <?php tampil_kategoriberita(); ?>
    </select>
  </div>

 
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Berita</button>
</form>
<div class="clear" style="clear:both;"></div>

<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $judul = $_POST['judul'];
  $tanggal = date('Y-m-d h:i:s');
  $isi = $_POST['isi'];
  $admin = $_SESSION['username'];
  $kategori = $_POST['kategori'];

  $namafoto = str_replace(' ', '-', $id.'-'.$admin.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/berita/'.$namafoto);
 
  
 
$cek = "SELECT * FROM berita where kd_berita='$id'";
$sql = $conn->query($cek);
 if($sql->num_rows > 0){
$maxId = $conn->query("SELECT MAX(kd_berita) AS max_id FROM berita");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "B"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);

   $sql = "INSERT INTO berita VALUES ('$id','$judul','$tanggal','$isi','$namafoto','$admin','$kategori')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=berita");
  }
}else{ 

$sql = "INSERT INTO berita VALUES ('$id','$judul','$tanggal','$isi','$namafoto','$admin','$kategori')";
/*print_r($sql);
die();*/
  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=berita");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

