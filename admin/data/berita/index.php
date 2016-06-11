<?php  ob_start(); ?>
<div class="judul">
	<h2>Berita</h2>
</div>
<input class="btn btn-primary" type="button" value="Tambah Berita" onclick="window.location.href='?p=tambahberita'"> 
<br/><br/>
<table class="table table-striped">
	<thead>
    
  <tr>
	  <th>No</th>
	  
	  <th>Judul</th>

	  <th>Jenis Berita</th>
	  
	  <th>Event</th>
	</tr>
  </thead>
  <tbody>
    
	<?php
	$no = 1;
	$sql = "SELECT kd_berita,judul,kategoriberita.jenis_berita FROM berita
  join kategoriberita on berita.kd_kategoriberita=kategoriberita.kd_kategoriberita";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['judul'] ?></td>
	<td><?php echo $row['jenis_berita'] ?></td>
	  
	  <td>
	  	<a class="btn btn-danger" href="?p=hapusberita&id=<?php echo $row['kd_berita'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editberita&id=<?php echo $row['kd_berita'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

