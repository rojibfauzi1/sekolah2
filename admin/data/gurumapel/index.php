<?php  ob_start(); ?>
<div class="judul">
	<h2>Guru Mapel</h2>
</div>
<input class="btn btn-primary" type="button" value="Tambah Guru Mapel" onclick="window.location.href='?p=tambahgurumapel'"> 
<br/><br/>
<table class="table table-striped">
	<thead>
    
  <tr>
	  <th>No</th>
	  
	  <th>Nama Guru</th>
	  <th>Mata Pelajaran</th>
	 
	  <th>Keterangan</th>
	  
	  <th>Event</th>
	</tr>
  </thead>
  <tbody>
    
	<?php
	$no = 1;
	$sql = "SELECT * FROM gurumapel
  			join guru on gurumapel.kd_guru=guru.kd_guru
  			join mapel on gurumapel.kd_mapel=mapel.kd_mapel";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['nama_guru'] ?></td>
	  <td><?php echo $row['mapel'] ?></td>
	
	  <td><?php echo $row['keterangan'] ?></td>
	  
	  <td>
	  	<a class="btn btn-danger" href="?p=hapusgurumapel&id=<?php echo $row['kd_gurumapel'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editgurumapel&id=<?php echo $row['kd_gurumapel'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

