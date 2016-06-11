<?php  ob_start(); ?>
<div class="judul">
	<h2>Administrator</h2>
</div>
<input class="btn btn-primary" type="button" value="Tambah Administrator" onclick="window.location.href='?p=tambahadmin'"> 
<br/><br/>
<table class="table table-striped">
	<thead>
    
  <tr>
	  <th>No</th>
	  
	  <th>Nama</th>

	  <th>Username</th>
	  <th>Password</th>
	  
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
	<td><?php echo $row['nama_admin'] ?></td>
	  <td><?php echo $row['username'] ?></td>
	  <td><?php echo $row['password'] ?></td>
	  
	  <td>
	  	<a class="btn btn-danger" href="?p=hapusadmin&id=<?php echo $row['kd_admin'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editadmin&id=<?php echo $row['kd_admin'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

