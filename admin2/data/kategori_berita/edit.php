<?php
include '../conf/connect.php';

if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $s = "UPDATE kategori SET id_kategori='$id',nama_kategori='$nama'";
  $s .= "WHERE id_kategori='$id'";
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=kategori");
  }
}elseif($_GET['id']){
  $s = "SELECT * FROM kategori WHERE id_kategori='$_GET[id]'";
  $sql = $conn->query($s);
  $row = $sql->fetch_assoc();
?>

<div class="judul">
  <h2>Edit Kategori</h2>
</div>
<form method="post" enctype="multipart/form" class="col-md-8">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" name="id" class="form-control" readOnly value="<?php echo $row['id_kategori'] ?>" ReadOnly="">
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" name="nama" class="form-control" value="<?php echo $row['nama'] ?>">
  </div>
  <button type="submit" name="edit" class="btn btn-primary">Edit Kategori</button>
</form>
<?php } ?>