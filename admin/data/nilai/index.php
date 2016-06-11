<?php  ob_start(); ?>
<div class="judul">
	<h2>Nilai</h2>
</div>
<input class="btn btn-primary" type="button" value="Tambah Nilai" onclick="window.location.href='?p=tambahnilai'"> 
<br/><br/>
<table class="table table-striped">
	<thead>
    
  <tr>
	  <th>No</th>
	  
	  <th>Mata Pelajaran</th>
	  <th>Jenis</th>
	  <th>Nama</th>
	 
	  <th>Nilai</th>
	  
	  <th>Event</th>
	</tr>
  </thead>
  <tbody>
    
	<?php
	$no = 1;
	$sql = "SELECT * FROM nilai
  			join gurumapel on gurumapel.kd_gurumapel=nilai.kd_gurumapel
  			join mapel on gurumapel.kd_mapel=mapel.kd_mapel
  			join siswa on nilai.kd_siswa=siswa.kd_siswa
  			join kategorinilai on nilai.kd_kategorinilai=kategorinilai.kd_kategorinilai";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['mapel'] ?></td>
	  <td><?php echo $row['jenis_nilai'] ?></td>
	  <td><?php echo $row['nama_siswa'] ?></td>
	  <td><?php echo $row['nilai'] ?></td>
	  
	  <td>
	  	<a class="btn btn-danger" href="?p=hapussiswakelas&id=<?php echo $row['kd_siswakelas'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editsiswakelas&id=<?php echo $row['kd_siswakelas'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

