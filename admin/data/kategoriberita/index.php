<?php  ob_start(); ?>
<div class="judul">
	<h2>Kategori Berita</h2>
</div>
<input class="btn btn-primary" type="button" value="Tambah Kategori Berita" onclick="window.location.href='?p=tambahkategoriberita'"> 
<br/><br/>
<table class="table table-striped">
	<thead>
    
  <tr>
	  <th>No</th>
	  
	  <th>Jenis Berita</th>

	  
	  
	  <th>Event</th>
	</tr>
  </thead>
  <tbody>
    
	<?php
	$no = 1;
	$sql = "SELECT * FROM kategoriberita";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	<td><?php echo $row['jenis_berita'] ?></td>
	  
	  
	  <td>
	  	<a class="btn btn-danger" href="?p=hapuskategoriberita&id=<?php echo $row['kd_kategoriberita'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editkategoriberita&id=<?php echo $row['kd_kategoriberita'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

