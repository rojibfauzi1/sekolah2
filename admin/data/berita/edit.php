<?php
function tampil_kategoriberita($i){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM kategoriberita where kd_kategoriberita='$i'";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_kategoriberita']."'>".$row['jenis_berita']."</option>";
  }

  $sql1 = "SELECT * FROM kategoriberita where kd_kategoriberita != '$i' order by kd_kategoriberita ASC";
  $s1 = $conn->query($sql1);
  while($row1 = $s1->fetch_assoc()){
    echo "<option value='".$row1['kd_kategoriberita']."'>".$row1['jenis_berita']."</option>";
  }
}

if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $judul = $_POST['judul'];
  $tanggal = date('Y-m-d h:i:s');
  $isi = $_POST['isi'];
  $admin = $_SESSION['username'];
  $kategori = $_POST['kategori'];

  $namafoto = str_replace(' ', '-', $id.'-'.$admin.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/berita/'.$namafoto);
 

$s = "UPDATE berita SET kd_berita='$id',judul='$judul',tanggal='$tanggal',isi='$isi',gambar='$namafoto'
      ,kd_admin='$admin',kd_kategoriberita='$kategori'";
  $s .= " WHERE kd_berita='$id'";
  /*print_r($s);
  die();*/
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=berita");
  }

}elseif($_GET['id']){
  $sql = $conn->query("SELECT * FROM berita WHERE kd_berita = '$_GET[id]'");
  $row = $sql->fetch_assoc();

?>
<div class="judul">
	<h2>Edit Berita</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=editberita">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $row['kd_berita']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Judul</label>
    <input type="text" required name="judul" class="form-control" value="<?php echo $row['judul'] ?>">
  </div>

  <div class="form-group">
    <label for="nama">Isi</label>
    <textarea required name="isi" class="form-control"><?php echo $row['isi'] ?></textarea>
    
  </div>

  <div class="form-group">
    <label for="nama">Gambar</label>
    <input type="file" required name="gambar" class="form-control" accept="image/jpeg">
  </div>
  <img src="../upload/berita/<?php echo $row['gambar']; ?>" width="100px">
<br/><br/>
<div class="form-group">
    <label for="nama">Jenis Berita</label><br/>
    <select name="kategori" class="form-control">
      <?php tampil_kategoriberita($row['kd_kategoriberita']); ?>
    </select>
  </div>
 
  <button type="submit" name="edit" class="btn btn-primary">Edit Berita</button>
</form>
<?php  } ?>
<div class="clear" style="clear:both;"></div>
