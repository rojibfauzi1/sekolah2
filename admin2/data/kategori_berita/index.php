<?php  ob_start(); ?>
<?php
$sql = "SELECT max(id_kategori) as id FROM kategori";
$s = $conn->query($sql);
$row = $s->fetch_assoc();
$idku = $row['id'];
$nourut = (int)$idku;
$nourut++;
$idBaru = $nourut; 
?>
<div class="judul">
	<h2>Tambah Kategori</h2>
</div>
<form method="post" enctype="multipart/form" class="col-md-8" action="?p=tambahkategori">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" name="nama" class="form-control" placeholder="Nama">
  </div>
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Kategori</button>
</form>
<div class="clear" style="clear:both;"></div>
<div class="judul">
	<h2>Kategori</h2>
</div>

<table class="table table-striped">
	<thead>
		
	<tr>
	  <th>No</th>
	  
	  <th>Nama kategori</th>
	  <th>Event</th>
	</tr>
	</thead>
	<tbody>
		
	<?php
	$no = 1;
	$sql = "SELECT * FROM kategori";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['nama_kategori'] ?></td>
	  
	  <td>
	  	<a class="btn btn-danger" href="?p=hapuskategori&id=<?php echo $row['id_kategori'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editkategori&id=<?php echo $row['id_kategori'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
	</tbody>
</table>