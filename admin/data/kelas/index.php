<?php  ob_start(); ?>
<div class="judul">
	<h2>Siswa</h2>
</div>
<input class="btn btn-primary" type="button" value="Tambah Kelas" onclick="window.location.href='?p=tambahkelas'"> 
<br/><br/>
<table class="table table-striped">
	<thead>
    
  <tr>
	  <th>No</th>
	  
	  <th>Nama Kelas</th>
	  <th>Tingkat</th>
	 
	  <th>Jurusan</th>
	  
	  <th>Event</th>
	</tr>
  </thead>
  <tbody>
    
	<?php
	$no = 1;
	$sql = "SELECT * FROM kelas
  join jurusan on kelas.kd_jurusan=jurusan.kd_jurusan";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['nama_kelas'] ?></td>
	  <td><?php echo $row['tingkat'] ?></td>
	
	  <td><?php echo $row['nama_jurusan'] ?></td>
	  
	  <td>
	  	<a class="btn btn-danger" href="?p=hapuskelas&id=<?php echo $row['kd_kelas'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editkelas&id=<?php echo $row['kd_kelas'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

