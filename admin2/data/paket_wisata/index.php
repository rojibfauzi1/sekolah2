<?php  ob_start(); ?>
<div class="judul">
	<h2>Paket Wisata</h2>
</div>
<input class="btn btn-primary" type="button" value="Tambah " onclick="window.location.href='?p=tambahpaket_wisata'"> 
<br/><br/>
<table class="table table-striped">
	<thead>
    
  <tr>
	  <th>No</th>
	  
	  <th>Nama</th>

	  <th>Kategori</th>
	  <th>Harga</th>
	  <th>quota</th>
	  <th>Status</th>
	  <th>Event</th>
	</tr>
  </thead>
  <tbody>
    
	<?php
	$no = 1;
	$sql = "SELECT * FROM paket_wisata
  join kategori on paket_wisata.id_kategori=kategori.id_kategori order by tanggal desc";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['nama'] ?></td>
	<td><?php echo $row['nama_kategori'] ?></td>
	   <td><?php echo $row['harga'] ?></td>
	  <td><?php echo $row['quota'] ?></td>
	<td><?php echo $row['status'] ?></td>
	  <td>
	  	<a class="btn btn-danger" href="?p=hapuspaket_wisata&id=<?php echo $row['id_paket'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editpaket_wisata&id=<?php echo $row['id_paket'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

