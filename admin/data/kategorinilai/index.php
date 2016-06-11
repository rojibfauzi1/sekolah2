<?php  ob_start(); ?>
<div class="judul">
	<h2>Kategori Nilai</h2>
</div>
<input class="btn btn-primary" type="button" value="Tambah Kategori Nilai" onclick="window.location.href='?p=tambahkategorinilai'"> 
<br/><br/>
<table class="table table-striped">
	<thead>
    
  <tr>
	  <th>No</th>
	  
	  <th>Jenis Nilai</th>

	  <th>Keterangan</th>
	  
	  <th>Event</th>
	</tr>
  </thead>
  <tbody>
    
	<?php
	$no = 1;
	$sql = "SELECT * FROM kategorinilai";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	<td><?php echo $row['jenis_nilai'] ?></td>
	  <td><?php echo $row['keterangan'] ?></td>
	  
	  <td>
	  	<a class="btn btn-danger" href="?p=hapuskategorinilai&id=<?php echo $row['kd_kategorinilai'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editkategorinilai&id=<?php echo $row['kd_kategorinilai'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

