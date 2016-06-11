<?php  ob_start(); ?>
<?php
$sql = "SELECT max(id_galeri) as id FROM galeri";
$s = $conn->query($sql);
$row = $s->fetch_assoc();
$idku = $row['id'];
$nourut = (int)$idku;
$nourut++;
$idBaru = $nourut; 


?>
<div class="judul">
	<h2>Tambah Galeri Foto</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=tambahgallery">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" name="id" required class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>

  
  <div class="form-group">
    <label for="foto1">Gambar</label>
    <input type="file" name="gambar" accept="image/jpeg">
   
  </div>
  <div class="form-group">
    <label for="nama">Keterangan Lokasi</label>
    <textarea  required name="lokasi" class="form-control"></textarea>
  </div>
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Gallery</button>
</form>
<div class="clear" style="clear:both;"></div>
<div class="judul">
	<h2>Gallery Foto</h2>
</div>

<table class="table table-striped">
	<thead>
		
	<tr>
	  <th>No</th>
	  
	  <th>Gambar</th>
	  <th>Lokasi</th>
	  <th>Aksi</th>
	</tr>
	</thead>
	<tbody>
		
	<?php
	$no = 1;
	$sql = "SELECT * FROM galeri order by id_galeri desc";
	/*$sql = "SELECT * FROM gallery";*/
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><img width="100px" src="../upload/gallery/<?php echo $row['gambar'] ?>"></td>
	  <td><?php echo $row['ket_lokasi'] ?></td>
	  <td>
	  	<a class="btn btn-danger" href="?p=hapusgallery&id=<?php echo $row['id_galeri'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editgallery&id=<?php echo $row['id_galeri'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
	</tbody>
</table>