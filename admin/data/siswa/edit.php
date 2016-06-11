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
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $jk = $_POST['jk'];
  
  $tempat = $_POST['tempat'];
  $tanggal = date('d/m/Y',strtotime($_POST['tanggal']));
  
  $alamat = $_POST['alamat'];
  $telp = $_POST['telp'];
  $agama = $_POST['agama'];
  $status = $_POST['status'];
  $jurusan = $_POST['jurusan'];
  $password = $_POST['password'];


  $fotonama = str_replace(' ', '-', $nis.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/siswa/'.$fotonama);

$s = "UPDATE pengajar SET id_pengajar='$id',nip='$nip',nama_guru='$nama',
  jenis_kelamin='$jk',email='$email',No_HP='$hp',tempat_lahir='$tempat',tgl_lahir='$tanggal',
  agama='$agama',jabatan='$jabatan',alamat='$alamat',password='$password',gambar='$fotonama'";
  $s .= " WHERE id_pengajar='$id'";
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=guru");
  }

}elseif($_GET['id']){
  $sql = $conn->query("SELECT * FROM siswa WHERE kd_siswa = '$_GET[id]'");
  $row = $sql->fetch_assoc();

?>
<div class="judul">
	<h2>Edit Siswa</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=editsiswa">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $row['kd_siswa']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">NIS</label>
    <input type="text" required name="nis" value="<?php echo $row['nis'] ?>" class="form-control" placeholder="NIS">
  </div>
  <div class="form-group">
    <label for="nama">Nama Siswa</label>
    <input type="text" required name="nama" value="<?php echo $row['nama_siswa'] ?>" class="form-control" placeholder="Nama">
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
      <input type="text" required name="tanggal" value="<?php echo $row['tanggal_lahir'] ?>" class="form-control" id="datepicker2" ><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
    </div>
  </div>
  <div class="form-group">
    <label for="nama">Alamat</label>
    <textarea required name="alamat" class="form-control" placeholder="Alamat" ><?php echo $row['alamat'] ?></textarea>
  </div>
  <div class="form-group">
    <label for="nama">No Telepon</label>
    <input type="text" pattern="08[0-9]{10,11}" required name="telp" class="form-control" placeholder="No Telepon" value="<?php echo $row['no_telepon'] ?>">
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
    <label for="nama">Jurusan</label><br/>
    <select name="jurusan" class="form-control">
    	<?php tampil_jurusan($row['kd_jurusan']); ?>
    </select>
  </div>
  <div class="form-group">
    <label for="jk">Status</label><br/>
    <input type="radio" name="status" value="aktif" <?php if($row['status']=='aktif'){ echo 'checked';} ?>> aktif&nbsp;&nbsp;&nbsp;&nbsp;  
    <input type="radio" name="status" value="lulus"  <?php if($row['status']=='lulus'){ echo 'checked';} ?>> lulus&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="status" value="keluar" <?php if($row['status']=='keluar'){ echo 'checked';} ?>> keluar&nbsp;&nbsp;
    
  </div>
  <div class="form-group">
    <label for="nama">Password</label>
    <input type="text" required name="password" class="form-control" value="<?php echo $row['password'] ?>" placeholder="Password">
  </div>
 
  <button type="submit" name="edit" class="btn btn-primary">Edit Siswa</button>
</form>
<?php  } ?>
<div class="clear" style="clear:both;"></div>
