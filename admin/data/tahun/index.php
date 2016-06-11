<?php  ob_start(); ?>
<div class="judul">
	<h2>Tahun</h2>
</div>
<input class="btn btn-primary" type="button" value="Tambah Tahun" onclick="window.location.href='?p=tambahtahun'"> 
<br/><br/>
<table class="table table-striped">
	<thead>
    
  <tr>
	  <th>No</th>
	  
	  <th>Tahun</th>

	  <th>Mulai</th>
	  <th>Akhir</th>
	  
	  <th>Event</th>
	</tr>
  </thead>
  <tbody>
    
	<?php
	$no = 1;
	$sql = "SELECT * FROM tahun";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	<td><?php echo $row['tahun'] ?></td>
	  <td><?php echo $row['mulai'] ?></td>
	  <td><?php echo $row['akhir'] ?></td>
	  
	  <td>
	  	<a class="btn btn-danger" href="?p=hapustahun&id=<?php echo $row['kd_tahun'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=edittahun&id=<?php echo $row['kd_tahun'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

