<?php
function tampil_guru($i){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM guru where kd_guru='$i'";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_guru']."'>".$row['nama_guru']."</option>";
  }

  $sql1 = "SELECT * FROM guru where kd_guru != '$i' order by kd_guru ASC";
  $s1 = $conn->query($sql1);
  while($row1 = $s1->fetch_assoc()){
    echo "<option value='".$row1['kd_guru']."'>".$row1['nama_guru']."</option>";
  }
}
function tampil_mapel($i){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM mapel where kd_mapel='$i'";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_mapel']."'>".$row['mapel']."</option>";
  }

  $sql1 = "SELECT * FROM mapel where kd_mapel != '$i' order by kd_mapel ASC";
  $s1 = $conn->query($sql1);
  while($row1 = $s1->fetch_assoc()){
    echo "<option value='".$row1['kd_mapel']."'>".$row1['mapel']."</option>";
  }
}
function tampil_tahun($i){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM tahun where kd_tahun='$i'";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_tahun']."'>".$row['tahun']."</option>";
  }

  $sql1 = "SELECT * FROM tahun where kd_tahun != '$i' order by kd_tahun ASC";
  $s1 = $conn->query($sql1);
  while($row1 = $s1->fetch_assoc()){
    echo "<option value='".$row1['kd_tahun']."'>".$row1['tahun']."</option>";
  }
}
function tampil_kelas($i){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM kelas where kd_kelas='$i'";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_kelas']."'>".$row['nama_kelas']."</option>";
  }

  $sql1 = "SELECT * FROM kelas where kd_kelas != '$i' order by kd_kelas ASC";
  $s1 = $conn->query($sql1);
  while($row1 = $s1->fetch_assoc()){
    echo "<option value='".$row1['kd_kelas']."'>".$row1['nama_kelas']."</option>";
  }
}

if(isset($_POST['edit'])){
    $id = $_POST['id'];
  $guru = $_POST['guru'];
  $mapel = $_POST['mapel'];
  $keterangan = $_POST['keterangan'];
  $tahun = $_POST['tahun'];
  $kelas = $_POST['kelas'];


$s = "UPDATE gurumapel SET kd_gurumapel='$id',kd_guru='$guru',kd_mapel='$mapel'
,keterangan='$keterangan',kd_tahun='$tahun',kd_kelas='$kelas'";
  $s .= " WHERE kd_gurumapel='$id'";
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=gurumapel");
  }

}elseif($_GET['id']){
  $sql = $conn->query("SELECT * FROM gurumapel WHERE kd_gurumapel = '$_GET[id]'");
  $row = $sql->fetch_assoc();

?>
<div class="judul">
	<h2>Edit Guru Mapel</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=editgurumapel">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $row['kd_gurumapel']; ?>">
  </div>

<div class="form-group">
    <label for="nama">Guru</label><br/>
    <select name="guru" class="form-control">
      <?php tampil_guru($row['kd_guru']); ?>
    </select>
  </div>

  <div class="form-group">
    <label for="nama">Mata Pelajaran</label><br/>
    <select name="mapel" class="form-control">
      <?php tampil_mapel($row['kd_mapel']); ?>
    </select>
  </div>

<div class="form-group">
    <label for="id">Keterangan</label>
    <input type="text" required name="keterangan" class="form-control" value="<?php echo $row['keterangan']; ?>">
  </div>

  <div class="form-group">
    <label for="nama">Tahun</label><br/>
    <select name="tahun" class="form-control">
      <?php tampil_tahun($row['kd_tahun']); ?>
    </select>
  </div>
  <div class="form-group">
    <label for="nama">Kelas</label><br/>
    <select name="kelas" class="form-control">
      <?php tampil_kelas($row['kd_kelas']); ?>
    </select>
  </div>
 
  <button type="submit" name="edit" class="btn btn-primary">Edit Guru Mapel</button>
</form>
<?php  } ?>
<div class="clear" style="clear:both;"></div>
