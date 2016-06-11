<?php
/*$selectIdMax = $conn->query("SELECT max(kd_siswa) as maxIdSiswa FROM siswa where kd_siswa like 'S%'");
  $hslIdMax = $selectIdMax->fetch_assoc();
  $idMax = $hslIdMax['maxIdSiswa'];

  $nourut = (int)substr($idMax, 1,2);
  $nourut++;
  $idBaru = "S".sprintf("%03s",$nourut);*/

$maxId = $conn->query("SELECT MAX(id_paket) AS max_id FROM paket_wisata");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "P"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);
function tampil_kategori(){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM kategori ";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['id_kategori']."'>".$row['nama_kategori']."</option>";
  }
}
?>
<div class="judul">
  <h2>Tambah Paket</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=tambahpaket_wisata">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" required name="nama" class="form-control" placeholder="Nama">
  </div>


<div class="form-group">
    <label for="nama">Jenis Kategori</label><br/>
    <select name="kategori" class="form-control">
      <?php tampil_kategori(); ?>
    </select>
  </div>
  <div class="form-group">
    <label for="nama">Harga</label>
    <input type="text" required name="harga" class="form-control" placeholder="Harga">
  </div>
  <div class="form-group">
    <label for="nama">Lama</label>
    <input type="text" required name="lama" class="form-control" placeholder="Lama">
  </div>
  <div class="form-group">
    <label for="nama">quota</label>
    <input type="number" required name="quota" class="form-control" placeholder="Quota">
  </div>


  <div class="form-group">
    <label for="nama">Fasilitas</label>
    <textarea required name="fasilitas" class="form-control"></textarea>
    
  </div>
  <div class="form-group">
    <label for="nama">deskripsi</label>
    <textarea required name="deskripsi" class="form-control"></textarea>
  
  </div>
  <div class="form-group">
    <label for="nama">Status</label><br/>
    <select name="status" class="form-control">
      <option value="hot promo">Hot Promo</option>
      <option value="paket terlaris">Paket Terlaris</option>
      <option value="combo">Combo</option>
    </select>
  </div>
  <div class="form-group">
    <label for="nama">Gambar</label>
    <input type="file" required name="gambar" class="form-control" accept="image/jpeg">
  </div>



 
  <button type="submit" name="kirim" class="btn btn-primary">Tambah </button>
</form>
<div class="clear" style="clear:both;"></div>

<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  
  $kategori = $_POST['kategori'];
  $harga = $_POST['harga'];
  $lama = $_POST['lama'];
  $deskripsi = $_POST['deskripsi'];
  $quota = $_POST['quota'];
  $fasilitas = $_POST['fasilitas'];
  $status = $_POST['status'];
  $tanggal = date('Y-m-d h:i:s');

  $fotonama = str_replace(' ', '-', $id.'-'.$nama.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/paket/'.$namafoto);
 
  
 
$cek = "SELECT * FROM paket_wisata where id_paket='$id'";
$sql = $conn->query($cek);
 if($sql->num_rows > 0){
$maxId = $conn->query("SELECT MAX(id_paket) AS max_id FROM paket_wisata");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "W"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);

   $sql = "INSERT INTO paket_wisata VALUES ('$id','$kategori','$harga','$lama','$nama','$deskripsi','$quota','$fasilitas','$status','$fotonama','$tanggal')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=berita");
  }
}else{ 

$sql = "INSERT INTO paket_wisata VALUES ('$id','$kategori','$harga','$lama','$nama','$deskripsi','$quota','$fasilitas','$status','$fotonama','$tanggal')";
/*print_r($sql);
die();*/
  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=paket_wisata");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

