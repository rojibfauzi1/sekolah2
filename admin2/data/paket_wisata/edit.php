<?php
function tampil_kategori($i){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM kategori where id_kategori='$i'";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['id_kategori']."'>".$row['nama_kategori']."</option>";
  }

  $sql1 = "SELECT * FROM kategori where id_kategori != '$i' order by id_kategori ASC";
  $s1 = $conn->query($sql1);
  while($row1 = $s1->fetch_assoc()){
    echo "<option value='".$row1['id_kategori']."'>".$row1['nama_kategori']."</option>";
  }
}
function tampil_status($i){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM paket_wisata where status='$i'";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['status']."'>".$row['status']."</option>";
  }

  $sql1 = "SELECT * FROM paket_wisata where status != '$i' order by id_paket ASC";
  $s1 = $conn->query($sql1);
  while($row1 = $s1->fetch_assoc()){
    echo "<option value='".$row1['status']."'>".$row1['status']."</option>";
  }
}

if(isset($_POST['edit'])){
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

  $namafoto = str_replace(' ', '-', $id.'-'.$nama.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/paket/'.$namafoto);
 
  

$s = "UPDATE paket_wisata SET id_paket='$id',id_kategori='$kategori',harga='$harga',lama='$lama',nama='$nama'
      ,deskripsi='$deskripsi',quota='$quota',fasilitas='$fasilitas',status='$status',gambar='$namafoto',tanggal='$tanggal'";
  $s .= " WHERE id_paket='$id'";
  /*print_r($s);
  die();*/
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=paket_wisata");
  }

}elseif($_GET['id']){
  $sql = $conn->query("SELECT * FROM paket_wisata WHERE id_paket = '$_GET[id]'");
  $row = $sql->fetch_assoc();

?>
<div class="judul">
	<h2>Edit Berita</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=editpaket_wisata">
    <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $row['id_paket']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" required name="nama" class="form-control" value="<?php echo $row['nama']; ?>">
  </div>


<div class="form-group">
    <label for="nama">Jenis Kategori</label><br/>
    <select name="kategori" class="form-control">
      <?php tampil_kategori($row['id_kategori']); ?>
    </select>
  </div>
  <div class="form-group">
    <label for="nama">Harga</label>
    <input type="text" required name="harga" class="form-control" value="<?php echo $row['harga']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Lama</label>
    <input type="text" required name="lama" class="form-control" value="<?php echo $row['lama']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">quota</label>
    <input type="number" required name="quota" class="form-control" value="<?php echo $row['quota']; ?>">
  </div>


  <div class="form-group">
    <label for="nama">Fasilitas</label>
    <textarea required name="fasilitas" class="form-control"><?php echo $row['fasilitas'] ?></textarea>
    
  </div>
  <div class="form-group">
    <label for="nama">deskripsi</label>
    <textarea required name="deskripsi" class="form-control"><?php echo $row['fasilitas'] ?></textarea>
  
  </div>
  <div class="form-group">
    <label for="nama">Status</label><br/>
    <select name="status" class="form-control">
  
    <?php/* tampil_status($row['status'])*/; ?>
    <?php
    if($row['status'] == 'hot promo'){
      echo "<option value='hot promo'>Hot Promo</option>";
      echo "<option value='paket terlaris'>Paket Terlaris</option>";
      echo "<option value='combo'>Combo</option>";
    }elseif ($row['status'] == 'paket terlaris') {
      echo "<option value='paket terlaris'>Paket Terlaris</option>";
      echo "<option value='hot promo'>Hot Promo</option>";
      echo "<option value='combo'>Combo</option>";
    }elseif ($row['status'] == 'combo') {
      echo "<option value='combo'>Combo</option>";
      echo "<option value='hot promo'>Hot Promo</option>";
      echo "<option value='paket terlaris'>Paket Terlaris</option>";
    }

    ?>
  
    </select>
  </div>
  <div class="form-group">
    <label for="nama">Gambar</label>
    <input type="file" required name="gambar" class="form-control" accept="image/jpeg">
  </div>
  <img src="../upload/paket/<?php echo $row['gambar']; ?>" width="100px">
<br/><br/>

 
  <button type="submit" name="edit" class="btn btn-primary">Edit </button>
</form>
<?php  } ?>
<div class="clear" style="clear:both;"></div>
