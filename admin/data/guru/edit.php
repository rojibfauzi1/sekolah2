<?php


if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $nip = $_POST['nip'];
  $nama = $_POST['nama'];
  $jk = $_POST['jk'];
  
  $tempat = $_POST['tempat'];
  $tanggal = date('Y-m-d',strtotime($_POST['tanggal']));
  
  $alamat = $_POST['alamat'];
  $telp = $_POST['telp'];
  $agama = $_POST['agama'];
  $pendidikan = $_POST['pendidikan'];
  $status_aktif = $_POST['status_aktif'];
  $status = $_POST['status'];

  $password = $_POST['password'];


  $fotonama = str_replace(' ', '-', $nip.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/guru/'.$fotonama);

$s = "UPDATE guru SET kd_guru='$id',nip='$nip',nama_guru='$nama',
  jenis_kelamin='$jk',tempat_lahir='$tempat',tanggal_lahir='$tanggal',alamat='$alamat',
  no_telepon='$telp',foto='$fotonama',agama='$agama',pendidikan='$pendidikan',status_aktif='$status_aktif',
  status='$status',password='$password',foto='$fotonama'";
  $s .= " WHERE kd_guru='$id'";
 /* print_r($s);
  die();*/
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=guru");
  }

}elseif($_GET['id']){
  $sql = $conn->query("SELECT * FROM guru WHERE kd_guru = '$_GET[id]'");
  $row = $sql->fetch_assoc();

?>
<div class="judul">
	<h2>Edit Gurur</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=editguru">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $row['kd_guru']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">NIP</label>
    <input type="text" required name="nip" value="<?php echo $row['nip'] ?>" class="form-control" >
  </div>
  <div class="form-group">
    <label for="nama">Nama Guru</label>
    <input type="text" required name="nama" value="<?php echo $row['nama_guru'] ?>" class="form-control">
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
    <img src="../upload/guru/<?php echo $row['foto'] ?>" width="100px" ><br/><br/> 
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
    <label for="nama">Pendidikan</label>
    <input type="text" required name="pendidikan" class="form-control"  value="<?php echo $row['pendidikan'] ?>">
  </div>
  <div class="form-group">
    <label for="jk">Status Aktif</label><br/>
    <input type="radio" name="status_aktif" value="aktif" <?php if($row['status_aktif']=='aktif'){ echo 'checked';} ?>> Aktif&nbsp;&nbsp;&nbsp;&nbsp;  
    <input type="radio" name="status_aktif" value="tidak"  <?php if($row['status_aktif']=='tidak'){ echo 'checked';} ?>> Tidak&nbsp;&nbsp;&nbsp;&nbsp;
    
    
  </div>
    <div class="form-group">
    <label for="jk">Status</label><br/>
    <input type="radio" name="status" value="PNS" <?php if($row['status']=='PNS'){ echo 'checked';} ?>> PNS&nbsp;&nbsp;&nbsp;&nbsp;  
    <input type="radio" name="status" value="honorer"  <?php if($row['status']=='honorer'){ echo 'checked';} ?>> Honorer&nbsp;&nbsp;&nbsp;&nbsp;
    
    
  </div>
  <div class="form-group">
    <label for="nama">Password</label>
    <input type="text" required name="password" class="form-control" value="<?php echo $row['password'] ?>" placeholder="Password">
  </div>
 
  <button type="submit" name="edit" class="btn btn-primary">Edit Guru</button>
</form>
<?php  } ?>
<div class="clear" style="clear:both;"></div>
