<?php




if(isset($_POST['edit'])){
   $id = $_POST['id'];

  $judul = $_POST['judul'];
  $isi = $_POST['isi'];
  $tips = $_POST['tips'];
  $tempat = $_POST['tempat'];
  $tanggal =  date('Y-m-d H:i:s');

  $pengirim = $_SESSION['username'];

$fotonama = str_replace(' ', '-', $id.'-'.$judul.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/berita/'.$fotonama) ;

  $s = "UPDATE berita SET id_berita='$id',tempat_wisata='$tempat',
  judul='$judul',deskripsi='$isi',gambar='$fotonama',tanggal='$tanggal',tips_wisata='$tips',pengirim='$pengirim'";
  $s .= "WHERE id_berita='$id'";


 

  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=berita");
  }
}elseif($_GET['id']){
  $s = "SELECT * FROM berita WHERE id_berita='$_GET[id]'";
  $sql = $conn->query($s);
  $row = $sql->fetch_assoc();
?>

<div class="judul">
	<h2>Edit Berita</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $row['id_berita']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Judul Berita</label>
    <input type="text" required name="judul" class="form-control" value="<?php echo $row['judul']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Tempat Wisata</label>
    <input type="text" required name="tempat" class="form-control" value="<?php echo $row['tempat_wisata']; ?>">
  </div>
 

 
   <div class="form-group">
    <label for="nama">Isi Berita</label>
    <textarea  required name="isi" id="text-ckeditor" class="form-control"><?php echo $row['deskripsi']; ?></textarea>
    <script>CKEDITOR.replace('text-ckeditor');</script>
  </div>
  <div class="form-group">
    <label for="nama">Tips Wisata</label>
    <textarea  required name="tips" id="text-ckeditor" class="form-control"><?php echo $row['tips_wisata']; ?></textarea>
    <script>CKEDITOR.replace('text-ckeditor');</script>
  </div>
   <div class="form-group">
    <label for="foto">Foto</label>
    <input type="file" name="gambar" accept="image/jpeg">
  </div>
  <img width="100px" src="../upload/berita/<?php echo $row['gambar'] ?>">
  <br/><br/><button type="submit" name="edit" class="btn btn-primary">Edit Berita</button>
</form>
<?php } ?><br/><br/><br/><br/>