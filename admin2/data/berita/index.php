<?php  ob_start(); ?>
<?php
$sql = "SELECT max(id_berita) as id FROM berita";
$s = $conn->query($sql);
$row = $s->fetch_assoc();
$idku = $row['id'];
$nourut = (int)$idku;
$nourut++;
$idBaru = $nourut; 


?>
<div class="judul">
	<h2>Tambah Berita</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=tambahberita">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Judul Berita</label>
    <input type="text" required name="judul" class="form-control" placeholder="Nama">
  </div>
  <div class="form-group">
    <label for="nama">Tempat Wisata</label>
    <input type="text" required name="tempat" class="form-control" placeholder="Tempat Wisata">
  </div>
 

 
   <div class="form-group">
    <label for="nama">Isi Berita</label>
    <textarea  required name="isi" id="text-ckeditor" class="form-control"></textarea>
  	<script>CKEDITOR.replace('text-ckeditor');</script>
  </div>
  <div class="form-group">
    <label for="nama">Tips Wisata</label>
    <textarea  required name="tips" id="text-ckeditor" class="form-control"></textarea>
  	<script>CKEDITOR.replace('text-ckeditor');</script>
  </div>
<div class="form-group">
    <label for="foto1">Gambar</label>
    <input type="file" name="gambar" accept="image/jpeg">
   
  </div>
 
  
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Berita</button>
</form>
<div class="clear" style="clear:both;"></div>
<div class="judul">
	<h2>Berita</h2>
</div>

<table class="table table-striped" id="datatable">
	<thead>
		
	<tr>
	  <th>No</th>
	  
	  <th>Judul</th>
	  <th>Tempat Wisata</th>
	  <th>Deskripsi</th>
	  <th>Aksi</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$no = 1;
	$sql = "SELECT * FROM berita order by tanggal desc";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
		
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['judul'] ?></td>
	  <td><?php echo $row['tempat_wisata'] ?></td>
	  <td><?php echo $row['deskripsi'] ?></td>
	  <td>
	  	<a class="btn btn-danger" href="?p=hapusberita&id=<?php echo $row['id_berita'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editberita&id=<?php echo $row['id_berita'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
	</tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

