
<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $nama = $_POST['nama'];

  $username = $_POST['username'];
  $password = $_POST['password'];

  $filenama = str_replace(' ', '-', $username.'.jpg');
  move_uploaded_file($_FILES['foto']['tmp_name'], '../upload/admin/'.$filenama);
 
$cek = "SELECT * FROM admin where kd_admin='$id'";
$sql = $conn->query($cek);
 if($sql->num_rows > 0){
$maxId = $conn->query("SELECT MAX(kd_admin) AS max_id FROM admin");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "A"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);

   $sql = "INSERT INTO admin VALUES ('$id','$nama','$username','$password','$filenama')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=admin");
  }
}else{ 

  $sql = "INSERT INTO admin VALUES ('$id','$nama','$username','$password','$filenama')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=admin");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>
<?php
/*$selectIdMax = $conn->query("SELECT max(kd_siswa) as maxIdSiswa FROM siswa where kd_siswa like 'S%'");
  $hslIdMax = $selectIdMax->fetch_assoc();
  $idMax = $hslIdMax['maxIdSiswa'];

  $nourut = (int)substr($idMax, 1,2);
  $nourut++;
  $idBaru = "S".sprintf("%03s",$nourut);*/

$maxId = $conn->query("SELECT MAX(kd_admin) AS max_id FROM admin");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "A"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);

?>


<div class="judul">
  <h2>Tambah Administrator</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Nama Lengkap</label>
    <input type="text" required name="nama" class="form-control" placeholder="Nama Lengkap">
  </div>

  <div class="form-group">
    <label for="nama">username</label>
    <input type="text" required name="username" class="form-control" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="nama">Password</label>
    <input type="password" required name="password" class="form-control" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="nama">Foto</label>
    <input type="file" required name="foto" class="form-control" accept="image/jpeg">
  </div>
 
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Administrator</button>
</form>
<div class="clear" style="clear:both;"></div>