<?php  ob_start(); ?>
<div class="judul">
	<h2>Siswa Kelas</h2>
</div>
<input class="btn btn-primary" type="button" value="Tambah Siswa Kelas" onclick="window.location.href='?p=tambahsiswakelas'"> 
<br/><br/>
<table class="table table-striped">
	<thead>
    
  <tr>
	  <th>No</th>
	  
	  <th>Nama Siswa</th>
	  <th>Nama Wali</th>
	  <th>Tahun</th>
	 
	  <th>Kelas</th>
	  
	  <th>Event</th>
	</tr>
  </thead>
  <tbody>
    
	<?php
	$no = 1;
	$sql = "SELECT * FROM siswakelas
  			join siswa on siswakelas.kd_siswa=siswa.kd_siswa
  			join wali on siswakelas.kd_wali=wali.kd_wali
  			join guru on guru.kd_guru=wali.kd_guru
  			join tahun on tahun.kd_tahun=wali.kd_tahun
  			join kelas on kelas.kd_kelas=wali.kd_kelas";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['nama_siswa'] ?></td>
	  <td><?php echo $row['nama_guru'] ?></td>
	  <td><?php echo $row['tahun'] ?></td>
	  <td><?php echo $row['nama_kelas'] ?></td>
	  
	  <td>
	  	<a class="btn btn-danger" href="?p=hapussiswakelas&id=<?php echo $row['kd_siswakelas'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editsiswakelas&id=<?php echo $row['kd_siswakelas'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

