<?php  ob_start(); ?>
<div class="judul">
	<h2>Profil</h2>
</div>
<input class="btn btn-primary" type="button" value="Tambah Profil" onclick="window.location.href='?p=tambahprofil'"> 
<br/><br/>
<table class="table table-striped">
	<thead>
    
  <tr>
	  <th>No</th>
	  
	  <th>Profil</th>

	  <th>Isi</th>
	  
	  <th>Event</th>
	</tr>
  </thead>
  <tbody>
    
	<?php
	$no = 1;
	$sql = "SELECT * FROM profil";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	<td><?php echo $row['nama'] ?></td>
	  <td><?php echo substr($row['isi'], 0,20) ?></td>
	  
	  <td>
	  	<a class="btn btn-danger" href="?p=hapusprofil&id=<?php echo $row['kd_profil'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editprofil&id=<?php echo $row['kd_profil'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

