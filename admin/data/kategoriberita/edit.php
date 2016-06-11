<?php


if(isset($_POST['edit'])){
   $id = $_POST['id'];
  $jenis = $_POST['jenis'];

  


$s = "UPDATE kategoriberita SET kd_kategoriberitajurusan='$id',jenis_berita='$jenis'";
  $s .= " WHERE kd_kategoriberita='$id'";
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=kategoriberita");
  }

}elseif($_GET['id']){
  $sql = $conn->query("SELECT * FROM kategoriberita WHERE kd_kategoriberita = '$_GET[id]'");
  $row = $sql->fetch_assoc();

?>
<div class="judul">
	<h2>Edit Kategori Berita</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=editkategoriberita">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $row['kd_kategoriberita']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Jenis Berita</label>
    <input type="text" required name="jenis" value="<?php echo $row['jenis_berita'] ?>" class="form-control">
  </div>


  <button type="submit" name="edit" class="btn btn-primary">Edit Kategori Berita</button>
</form>
<?php  } ?>
<div class="clear" style="clear:both;"></div>
