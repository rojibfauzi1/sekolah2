<?php
include '../conf/koneksi.php';



if(isset($_POST['edit'])){
 $id = $_POST['id'];
  
  $lokasi = $_POST['lokasi'];
  
  
  

  $fotonama = str_replace(' ', '-', $id.'-'.$lokasi.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/gallery/'.$fotonama) ;

  $s = "UPDATE galeri SET id_galeri='$id',ket_lokasi='$lokasi'";
  $s .= "WHERE id_galeri='$id'";
  /*print_r($s);
  die();*/

 

  $sql = $conn->query($s);

  if($sql){
     echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=gallery");
  }
}elseif($_GET['id']){
  $s = "SELECT * FROM galeri WHERE id_galeri='$_GET[id]'";
  $sql = $conn->query($s);
  $row = $sql->fetch_assoc();
?>

<div class="judul">
	<h2>Edit Gallery</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" name="id" class="form-control" readOnly value="<?php echo $row['id_galeri']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Lokasi</label>
    <input type="text" name="lokasi" class="form-control" value="<?php echo $row['ket_lokasi']; ?>">
  </div>
 
  <div class="form-group">
    <label for="foto1">Gambar</label>
    <input type="file" name="gambar" accept="image/jpeg">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <img width="100px" src="../upload/gallery/<?php echo $row['gambar'] ?>">
  <br/><br/><button type="submit" name="edit" class="btn btn-primary">Edit Gallery</button>
</form>
<?php } ?>