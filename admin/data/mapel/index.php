<?php  ob_start(); ?>
<div class="judul">
	<h2>Mata Pelajaran</h2>
</div>
<input class="btn btn-primary" type="button" value="Tambah Mata Pelajaran" onclick="window.location.href='?p=tambahmapel'"> 
<br/><br/>
<table class="table table-striped">
	<thead>
    
  <tr>
	  <th>No</th>
	  
	  <th>Mata Pelajaran</th>

	  <th>Jurusan</th>
	  
	  <th>Event</th>
	</tr>
  </thead>
  <tbody>
    
	<?php
	$no = 1;
	$sql = "SELECT mapel.mapel,jurusan.nama_jurusan FROM mapel
  join jurusan on mapel.kd_jurusan=jurusan.kd_jurusan";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['mapel'] ?></td>
	<td><?php echo $row['nama_jurusan'] ?></td>
	  
	  <td>
	  	<a class="btn btn-danger" href="?p=hapusmapel&id=<?php echo $row['kd_mapel'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editmapel&id=<?php echo $row['kd_mapel'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

