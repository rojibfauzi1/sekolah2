<?php


if(isset($_POST['edit'])){
   $id = $_POST['id'];
  $tahun = $_POST['tahun'];

    $mulai = date('Y-m-d',strtotime($_POST['mulai']));
  $akhir = date('Y-m-d',strtotime($_POST['akhir']));


$s = "UPDATE tahun SET kd_tahun='$id',tahun='$tahun',mulai='$mulai',akhir='$akhir'";
  $s .= " WHERE kd_tahun='$id'";
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=tahun");
  }

}elseif($_GET['id']){
  $sql = $conn->query("SELECT * FROM tahun WHERE kd_tahun = '$_GET[id]'");
  $row = $sql->fetch_assoc();

?>
<div class="judul">
	<h2>Edit Tahun</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=edittahun">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $row['kd_tahun']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Tahun</label>
    <input type="number"  required name="tahun" value="<?php echo $row['tahun'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <label for="nama">Mulai</label>
    <input type="text"  id="datepicker1" required name="mulai" value="<?php echo $row['mulai'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <label for="nama">Akhir</label>
    <input type="text" id="datepicker" required name="akhir" value="<?php echo $row['akhir'] ?>" class="form-control">
  </div>
 
  <button type="submit" name="edit" class="btn btn-primary">Edit Tahun</button>
</form>
<?php  } ?>
<div class="clear" style="clear:both;"></div>
