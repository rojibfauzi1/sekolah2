<?php ob_start(); ?>
<?php
$sql = "SELECT max(id_admin) as id FROM admin";
$s = $conn->query($sql);
$row = $s->fetch_assoc();
$idku = $row['id'];
$nourut = (int)$idku;
$nourut++;
$idBaru = $nourut; 
?>
<div class="judul">
	<h2>Tambah admin</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=tambahadmin">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" required  name="nama" class="form-control" placeholder="nama">
  </div>
  <div class="form-group">
    <label for="nama">username</label>
    <input type="text" required  name="username" class="form-control" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="nama">Password</label>
    <input type="password" required name="password" class="form-control" placeholder="Password">
  </div>
 

  <div class="form-group">
    <label for="foto1">Foto</label>
    <input type="file" required name="gambar" accept="image/jpeg">
    
  </div>
  
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Admin</button>
</form>
<div class="clear" style="clear:both;"></div>
<div class="judul">
	<h2>Admin</h2>
</div>

<table class="table table-striped">
	<thead>
		
	<tr>
	  <th>No</th>
	  
	  <th>Nama</th>
	  <th>Username</th>
	  <th>Foto</th>
	  
	  <th>Event</th>
	</tr>
	</thead>
	<tbody>
		
	<?php
	$no = 1;
	$sql = "SELECT * FROM admin";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['nama'] ?></td>
	  <td><?php echo $row['username'] ?></td>
	  
	  
	  <td><img width="50px" src="../upload/admin/<?php echo $row['foto'] ?>"></td>
	  <td>
	  	<a class="btn btn-danger" href="?p=hapusadmin&id=<?php echo $row['id_admin'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editadmin&id=<?php echo $row['id_admin'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
	</tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>