<?php  ob_start(); ?>
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

