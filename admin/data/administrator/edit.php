<?php


if(isset($_POST['edit'])){
 $id = $_POST['id'];
  $nama = $_POST['nama'];

  $username = $_POST['username'];
  $password = $_POST['password'];

  $filenama = str_replace(' ', '-', $username.'.jpg');
  move_uploaded_file($_FILES['foto']['tmp_name'], '../upload/admin/'.$filenama);
 

$s = "UPDATE admin SET kd_admin='$id',nama_admin='$nama',username='$username',
    password='$password',foto='$filenama'";
  $s .= " WHERE kd_admin='$id'";
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=admin");
  }

}elseif($_GET['id']){
  $sql = $conn->query("SELECT * FROM admin WHERE kd_admin = '$_GET[id]'");
  $row = $sql->fetch_assoc();

?>
<div class="judul">
	<h2>Edit Administrator</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=editadmin">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $row['kd_admin']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Nama Admin</label>
    <input type="text" required name="nama" value="<?php echo $row['nama_admin'] ?>" class="form-control">
  </div>


<div class="form-group">
    <label for="nama">Username</label>
    <input type="text" required name="username" value="<?php echo $row['username'] ?>" class="form-control" >
  </div>
  <div class="form-group">
    <label for="nama">Password</label>
    <input type="password" required name="password" value="<?php echo $row['password'] ?>" class="form-control" >
  </div> 
  <div class="form-group">
    <label for="nama">Foto</label>
    <input type="file" required name="foto" class="form-control" >
  </div>
  <img src="../upload/admin/<?php echo $row['foto']; ?>"><br/><br/>
  <br/><br/><br/><br/><br/><button type="submit" name="edit" class="btn btn-primary">Edit Administrator</button>
</form>
<?php  } ?>
<div class="clear" style="clear:both;"></div>
