<?php  ob_start(); ?>
<div class="judul">
	<h2>Jurusan</h2>
</div>
<input class="btn btn-primary" type="button" value="Tambah Jurusan" onclick="window.location.href='?p=tambahjurusan'"> 
<br/><br/>
<table class="table table-striped">
	<thead>
    
  <tr>
	  <th>No</th>
	  
	  <th>Jurusan</th>

	  <th>Keterangan</th>
	  
	  <th>Event</th>
	</tr>
  </thead>
  <tbody>
    
	<?php
	$no = 1;
	$sql = "SELECT nama_jurusan,keterangan FROM jurusan";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	<td><?php echo $row['nama_jurusan'] ?></td>
	  <td><?php echo $row['keterangan'] ?></td>
	  
	  <td>
	  	<a class="btn btn-danger" href="?p=hapusjurusan&id=<?php echo $row['kd_jurusan'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editjurusan&id=<?php echo $row['kd_jurusan'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

