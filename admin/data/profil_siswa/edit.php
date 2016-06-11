<?php


if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $jk = $_POST['jk'];
  
  $tempat = $_POST['tempat'];
  $tanggal = date('Y-m-d',strtotime($_POST['tanggal']));
  
  $alamat = $_POST['alamat'];
  $telp = $_POST['telp'];
  $agama = $_POST['agama'];


  $password = $_POST['password'];


  $fotonama = str_replace(' ', '-', $nip.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/guru/'.$fotonama);

$s = "UPDATE siswa SET kd_siswa='$id',nis='$nis',nama_siswa='$nama',
  jenis_kelamin='$jk',tempat_lahir='$tempat',tanggal_lahir='$tanggal',alamat='$alamat',
  no_telepon='$telp',agama='$agama',password='$password',foto='$fotonama'";
  $s .= " WHERE kd_siswa='$id'";
 /* print_r($s);
  die();*/
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=profil_guru");
  }

}elseif($_GET['id']){
  $sql = $conn->query("SELECT * FROM siswa WHERE kd_siswa = '$_GET[id]'");
  $row = $sql->fetch_assoc();

?>
<div class="judul">
	<h2>Edit Siswa</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=editprofil_guru">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $row['kd_siswa']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">NIS</label>
    <input type="text" required name="nis" value="<?php echo $row['nis'] ?>" class="form-control" >
  </div>
  <div class="form-group">
    <label for="nama">Nama Siswa</label>
    <input type="text" required name="nama" value="<?php echo $row['nama_siswa'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <label for="jk">Jenis Kelamin</label><br/>
    <input type="radio" name="jk" value="L" <?php if($row['jenis_kelamin'] == 'L'){ echo 'checked';} ?>>Laki-Laki<br/>
    <input type="radio" name="jk" value="P" <?php if($row['jenis_kelamin'] == 'P'){ echo 'checked';} ?> >Perempuan<br/>
  </div>
  <div class="form-group">
    <label for="nama">Tempat Lahir</label>
    <input type="text" required name="tempat" value="<?php echo $row['tempat_lahir'] ?>" class="form-control" placeholder="Tempat Lahir">
  </div>
  
  <div class="form-group">
    <label for="nama">Tanggal Lahir</label>
    <div class="input-group date">
      <input type="text" required name="tanggal" value="<?php echo $row['tanggal_lahir'] ?>" class="form-control" id="datepicker1" ><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
    </div>
  </div>
  <div class="form-group">
    <label for="nama">Alamat</label>
    <textarea required name="alamat" class="form-control" placeholder="Alamat" ><?php echo $row['alamat'] ?></textarea>
  </div>
  <div class="form-group">
    <label for="nama">No Telepon</label>
    <input type="text" pattern="08[0-9]{8,11}" required name="telp" class="form-control" placeholder="No Telepon" value="<?php echo $row['no_telepon'] ?>">
  </div>
    <div class="form-group">
    <label for="foto1">Foto</label>
    <input type="file" required name="gambar" accept="image/jpeg">
    <br/> 
    <img src="../upload/siswa/<?php echo $row['foto'] ?>" width="100px" ><br/><br/> 
  </div></br/></br/>
  
  <div class="form-group">
    <label for="jk">agama</label><br/>
    <input type="radio" name="agama" value="islam"<?php if($row['agama'] == 'islam'){ echo 'checked';} ?>> islam&nbsp;&nbsp;&nbsp;&nbsp;  
    <input type="radio" name="agama" value="protestan" <?php if($row['agama']=='protestan'){ echo 'checked';} ?>> protestan <br/>
    <input type="radio" name="agama" value="katolik" <?php if($row['agama']=='katolik'){ echo 'checked';} ?>> katolik&nbsp;&nbsp;
    <input type="radio" name="agama" value="hindu" <?php if($row['agama']=='hindu'){ echo 'checked';} ?>> hindu<br/>
    <input type="radio" name="agama" value="budha" <?php if($row['agama']=='budha'){ echo 'checked';} ?>> budha&nbsp;&nbsp;&nbsp;
    <input type="radio" name="agama" value="konghucu" <?php if($row['agama']=='konghucu'){ echo 'checked';} ?>> konghucu
  </div>

  <div class="form-group">
    <label for="nama">Password</label>
    <input type="text" required name="password" class="form-control" value="<?php echo $row['password'] ?>" placeholder="Password">
  </div>
 
  <button type="submit" name="edit" class="btn btn-primary">Edit Guru</button>
</form>
<?php  } ?>
<div class="clear" style="clear:both;"></div>
