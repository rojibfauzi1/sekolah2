<?php  ob_start(); ?>
<?php
if($_SESSION['nis']){
  $sql = $conn->query("SELECT * FROM siswa WHERE nis = '$nis'");
  $row = $sql->fetch_assoc();

?>
<div class="judul">
	<h2>Profil Siswa</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=editguru">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $row['kd_siswa']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">NIS</label>
    <input type="text" readOnly required name="nis" value="<?php echo $row['nis'] ?>" class="form-control" >
  </div>
  <div class="form-group">
    <label for="nama">Nama Siswa</label>
    <input type="text" readOnly required name="nama" value="<?php echo $row['nama_siswa'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <label for="jk">Jenis Kelamin</label><br/>
    <input type="text"  name="jk" class="form-control" readonly="" value="<?php if($row['jenis_kelamin'] == 'P'){ echo 'Perempuan';}else{ echo 'Laki-laki';}   ?>"><br/>
    
  </div>
  <div class="form-group">
    <label for="nama">Tempat Lahir</label>
    <input type="text" readonly="" required name="tempat" value="<?php echo $row['tempat_lahir'] ?>" class="form-control" placeholder="Tempat Lahir">
  </div>
  
  <div class="form-group">
    <label for="nama">Tanggal Lahir</label>
    <div class="input-group date">
      <input type="text" readonly="" required name="tanggal" value="<?php echo $row['tanggal_lahir'] ?>" class="form-control" id="datepicker1" ><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
    </div>
  </div>
  <div class="form-group">
    <label for="nama">Alamat</label>
    <textarea readonly="" required name="alamat" class="form-control" placeholder="Alamat" ><?php echo $row['alamat'] ?></textarea>
  </div>
  <div class="form-group">
    <label for="nama">No Telepon</label>
    <input type="text" readonly="" readonly=""pattern="08[0-9]{8,11}" required name="telp" class="form-control" placeholder="No Telepon" value="<?php echo $row['no_telepon'] ?>">
  </div>
    <div class="form-group">
    <label for="foto1">Foto</label>
    
    <img src="../upload/siswa/<?php echo $row['foto'] ?>" width="100px" ><br/><br/> 
  </div></br/></br/>
  
  <div class="form-group">
    <label for="nama">Tempat Lahir</label>
    <input type="text" readonly="" required name="tempat" value="<?php echo $row['agama'] ?>" class="form-control" placeholder="Tempat Lahir">
  </div>

  
  <div class="form-group">
    <label for="nama">Password</label>
    <input type="text" readonly="" required name="password" class="form-control" value="<?php echo $row['password'] ?>" placeholder="Password">
  </div>
 
  <a href="?p=editprofil_siswa&id=<?php echo $row['kd_siswa'] ?>" name="edit" class="btn btn-primary">Edit Guru</a>
</form>
<?php  } ?>
<!-- <div class="clear" style="clear:both;"></div>
<div class="judul">
	<h2>Guru</h2>
</div>
<input class="btn btn-primary" type="button" value="Tambah Guru" onclick="window.location.href='?p=tambahguru'"> 
<br/><br/>
<table class="table table-striped">
	<thead>
    
  <tr>
	  <th>No</th>
	  
	  <th>NIS</th>
	  <th>Nama Guru</th>
	 
	  <th>Password</th>
	  
	  <th>Event</th>
	</tr>
  </thead>
  <tbody>
    
	<?php
	$no = 1;
	$sql = "SELECT * FROM guru";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['nip'] ?></td>
	  <td><?php echo $row['nama_guru'] ?></td>
	
	  <td><?php echo $row['password'] ?></td>
	  
	  <td>
	  	<a class="btn btn-danger" href="?p=hapusguru&id=<?php echo $row['kd_guru'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editguru&id=<?php echo $row['kd_guru'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>
 -->
