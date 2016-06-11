<?php


if(isset($_POST['edit'])){
   $id = $_POST['id'];
  $nama = $_POST['nama'];

  $keterangan = $_POST['keterangan'];


$s = "UPDATE jurusan SET kd_jurusan='$id',nama_jurusan='$nama',keterangan='$keterangan'";
  $s .= " WHERE kd_jurusan='$id'";
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=jurusan");
  }

}elseif($_GET['id']){
  $sql = $conn->query("SELECT * FROM jurusan WHERE kd_jurusan = '$_GET[id]'");
  $row = $sql->fetch_assoc();

?>
<div class="judul">
	<h2>Edit Jurusan</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=editjurusan">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $row['kd_kelas']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Nama Jurusan</label>
    <input type="text" required name="nama" value="<?php echo $row['nama_jurusan'] ?>" class="form-control">
  </div>


<div class="form-group">
    <label for="nama">Keterangan</label>
    <input type="text" required name="keterangan" value="<?php echo $row['keterangan'] ?>" class="form-control" >
  </div>
 
  <button type="submit" name="edit" class="btn btn-primary">Edit Jurusan</button>
</form>
<?php  } ?>
<div class="clear" style="clear:both;"></div>
