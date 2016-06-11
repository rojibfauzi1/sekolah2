<?php


if(isset($_POST['edit'])){
   $id = $_POST['id'];
  $jenis = $_POST['jenis'];

  $keterangan = $_POST['keterangan'];


$s = "UPDATE kategorinilai SET kd_kategorinilai='$id',jenis_nilai='$jenis',keterangan='$keterangan'";
  $s .= " WHERE kd_kategorinilai='$id'";
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=kategorinilai");
  }

}elseif($_GET['id']){
  $sql = $conn->query("SELECT * FROM kategorinilai WHERE kd_kategorinilai = '$_GET[id]'");
  $row = $sql->fetch_assoc();

?>
<div class="judul">
	<h2>Edit Kategori Nilai</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=editkategorinilai">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $row['kd_kategorinilai']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Jenis Nilai</label>
    <input type="text" required name="jenis" value="<?php echo $row['jenis_nilai'] ?>" class="form-control">
  </div>


<div class="form-group">
    <label for="nama">Keterangan</label>
    <input type="text" required name="keterangan" value="<?php echo $row['keterangan'] ?>" class="form-control" >
  </div>
 
  <button type="submit" name="edit" class="btn btn-primary">Edit Kategori Nilai</button>
</form>
<?php  } ?>
<div class="clear" style="clear:both;"></div>
