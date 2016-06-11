<?php  ob_start(); ?>
<div class="judul">
	<h2>Siswa</h2>
</div>
<input class="btn btn-primary" type="button" value="Tambah Siswa" onclick="window.location.href='?p=tambahsiswa'"> 
<br/><br/>
<table class="table table-striped">
	<thead>
    
  <tr>
	  <th>No</th>
	  
	  <th>NIS</th>
	  <th>Nama Siswa</th>
	 
	  <th>Password</th>
	  
	  <th>Event</th>
	</tr>
  </thead>
  <tbody>
    
	<?php
	$no = 1;
	$sql = "SELECT * FROM siswa";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['nis'] ?></td>
	  <td><?php echo $row['nama_siswa'] ?></td>
	
	  <td><?php echo $row['password'] ?></td>
	  
	  <td>
	  	<a class="btn btn-danger" href="?p=hapussiswa&id=<?php echo $row['kd_siswa'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editsiswa&id=<?php echo $row['kd_siswa'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

