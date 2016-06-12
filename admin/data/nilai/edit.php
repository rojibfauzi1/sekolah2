<?php 



function tampil_kategorinilai($i){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM kategorinilai where kd_kategorinilai='$i'";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_kategorinilai']."'>".$row['jenis_nilai']."</option>";
  }

  $sql1 = "SELECT * FROM kategorinilai where kd_kategorinilai != '$i' order by kd_kategorinilai ASC";
  $s1 = $conn->query($sql1);
  while($row1 = $s1->fetch_assoc()){
    echo "<option value='".$row1['kd_kategorinilai']."'>".$row1['jenis_nilai']."</option>";
  }
}
/*function tampil_semester($i){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM nilai where kd_nilai='$i'";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['semester']."'>".$row['semester']."</option>";
  }

  $sql1 = "SELECT * FROM nilai where kd_nilai != '$i'";
  $s1 = $conn->query($sql1);
  while($row1 = $s1->fetch_assoc()){
    echo "<option value='".$row1['semester']."'>".$row1['semester']."</option>";
  }
}*/

if(isset($_POST['edit'])){
    $id = $_POST['id'];
  $kategorinilai = $_POST['kategorinilai'];
  $semester = $_POST['semester'];
  $nilai = $_POST['nilai'];


$s = "UPDATE nilai SET kd_nilai='$id',kd_kategorinilai='$kategorinilai',
  semester='$semester',nilai='$nilai'";
  $s .= " WHERE kd_nilai='$id'";
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=nilai");
  }

}elseif($_GET['id']){
  $sql = $conn->query("SELECT * FROM nilai WHERE kd_nilai = '$_GET[id]'");
  $row = $sql->fetch_assoc();

?>
<div class="judul">
	<h2>Edit Wali</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=editnilai">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $row['kd_nilai']; ?>">
  </div>


  <div class="form-group">
    <label for="nama">Jenis Nilai</label><br/>
    <select name="kategorinilai" class="form-control">
      <?php tampil_kategorinilai($row['kd_kategorinilai']); ?>
    </select>
  </div>
 <div class="form-group">
   <label>Semester</label><br/>
   <select class="form-control" name="semester">
     <option value="<?php if($row['semester'] == 'ganjil'){ echo 'ganjil';}else{ echo 'genap';} ?>">
     <?php if($row['semester'] == 'ganjil'){ echo 'ganjil';}else{ echo 'genap';} ?></option>
     <option value="<?php if($row['semester'] != 'ganjil'){ echo 'ganjil';}else{ echo 'genap';} ?>">
     <?php if($row['semester'] != 'ganjil'){ echo 'ganjil';}else{ echo 'genap';} ?></option>
   </select>
 </div>

  <div class="form-group">
    <label>Nilai</label><br/>
    <input type="number" name="nilai" class="form-control" value="<?php echo $row['nilai'] ?>" required>
  </div>
 
  <button type="submit" name="edit" class="btn btn-primary">Edit Wali</button>
</form>
<?php  } ?>
<div class="clear" style="clear:both;"></div>
