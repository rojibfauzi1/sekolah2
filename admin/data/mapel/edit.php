<?php
function tampil_jurusan($i){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM jurusan where kd_jurusan='$i'";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_jurusan']."'>".$row['nama_jurusan']."</option>";
  }

  $sql1 = "SELECT * FROM jurusan where kd_jurusan != '$i' order by kd_jurusan ASC";
  $s1 = $conn->query($sql1);
  while($row1 = $s1->fetch_assoc()){
    echo "<option value='".$row1['kd_jurusan']."'>".$row1['nama_jurusan']."</option>";
  }
}

if(isset($_POST['edit'])){
   $id = $_POST['id'];
  $nama = $_POST['nama'];

  $jurusan = $_POST['jurusan'];


$s = "UPDATE mapel SET kd_mapel='$id',mapel='$nama',kd_jurusan='$jurusan'";
  $s .= " WHERE kd_mapel='$id'";
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=mapel");
  }

}elseif($_GET['id']){
  $sql = $conn->query("SELECT * FROM mapel WHERE kd_mapel = '$_GET[id]'");
  $row = $sql->fetch_assoc();

?>
<div class="judul">
	<h2>Edit Mata Pelajaran</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $row['kd_mapel']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Nama Mata Pelajaran</label>
    <input type="text" required name="nama" value="<?php echo $row['mapel'] ?>" class="form-control" placeholder="Nama Kelas">
  </div>


<div class="form-group">
    <label for="nama">Jurusan</label><br/>
    <select name="jurusan" class="form-control">
      <?php tampil_jurusan($row['kd_jurusan']); ?>
    </select>
  </div>
 
  <button type="submit" name="edit" class="btn btn-primary">Edit Mata Pelajaran</button>
</form>
<?php  } ?>
<div class="clear" style="clear:both;"></div>
