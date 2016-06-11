<?php


if(isset($_POST['edit'])){
    $id = $_POST['id'];
  $profil = $_POST['profil'];

  $keterangan = $_POST['keterangan'];


$s = "UPDATE profil SET kd_profil='$id',profil='$profil',keterangan='$keterangan'";
  $s .= " WHERE kd_profil='$id'";
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=profil");
  }

}elseif($_GET['id']){
  $sql = $conn->query("SELECT * FROM profil WHERE kd_profil = '$_GET[id]'");
  $row = $sql->fetch_assoc();

?>
<div class="judul">
	<h2>Edit Profil</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=editprofil">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $row['kd_profil']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Profil</label>
    <input type="text" required name="profil" value="<?php echo $row['profil'] ?>" class="form-control">
  </div>


<div class="form-group">
    <label for="nama">Keterangan</label>
    <input type="text" required name="keterangan" value="<?php echo $row['keterangan'] ?>" class="form-control" >
  </div>
 
  <button type="submit" name="edit" class="btn btn-primary">Edit Profil</button>
</form>
<?php  } ?>
<div class="clear" style="clear:both;"></div>
