<?php
/*$selectIdMax = $conn->query("SELECT max(kd_siswa) as maxIdSiswa FROM siswa where kd_siswa like 'S%'");
  $hslIdMax = $selectIdMax->fetch_assoc();
  $idMax = $hslIdMax['maxIdSiswa'];

  $nourut = (int)substr($idMax, 1,2);
  $nourut++;
  $idBaru = "S".sprintf("%03s",$nourut);*/

$maxId = $conn->query("SELECT MAX(kd_siswa) AS max_id FROM siswa");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "S"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);
function tampil_jurusan(){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM jurusan ";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_jurusan']."'>".$row['nama_jurusan']."</option>";
  }
}
?>
<div class="judul">
  <h2>Tambah Siswa</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=tambahsiswa">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">NIS</label>
    <input type="text" required name="nis" class="form-control" placeholder="NIS">
  </div>
  <div class="form-group">
    <label for="nama">Nama Siswa</label>
    <input type="text" required name="nama" class="form-control" placeholder="Nama">
  </div>
  <div class="form-group">
    <label for="jk">Jenis Kelamin</label><br/>
    <input type="radio" name="jk" value="L">Laki-Laki<br/>
    <input type="radio" name="jk" value="P">Perempuan<br/>
  </div>
  <div class="form-group">
    <label for="nama">Tempat Lahir</label>
    <input type="text" required name="tempat" class="form-control" placeholder="Tempat Lahir">
  </div>
  
  <div class="form-group">
    <label for="nama">Tanggal Lahir</label>
    <div class="input-group date">
      <input type="date" required name="tanggal" id="datepicker2" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
    </div>
  </div>
  <div class="form-group">
    <label for="nama">Alamat</label>
    <textarea required name="alamat" class="form-control" placeholder="Alamat"></textarea>
  </div>
  <div class="form-group">
    <label for="nama">No Telepon</label>
    <input type="text" required name="telp" class="form-control" placeholder="No Telepon">
  </div>
    <div class="form-group">
    <label for="foto1">Foto</label>
    <input type="file" required name="gambar" accept="image/jpeg">
    
  </div>
  
  <div class="form-group">
    <label for="jk">agama</label><br/>
    <input type="radio" name="agama" value="islam"> islam&nbsp;&nbsp;&nbsp;&nbsp;  
    <input type="radio" name="agama" value="protestan"> protestan <br/>
    <input type="radio" name="agama" value="katolik"> katolik&nbsp;&nbsp;
    <input type="radio" name="agama" value="hindu"> hindu<br/>
    <input type="radio" name="agama" value="budha"> budha&nbsp;&nbsp;&nbsp;
    <input type="radio" name="agama" value="konghucu"> konghucu
  </div>
<div class="form-group">
    <label for="nama">Jurusan</label><br/>
    <select name="jurusan" class="form-control">
      <?php tampil_jurusan(); ?>
    </select>
  </div>
  <div class="form-group">
    <label for="jk">Status</label><br/>
    <input type="radio" name="status" value="aktif"> aktif&nbsp;&nbsp;&nbsp;&nbsp;  
    <input type="radio" name="status" value="lulus"> lulus&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="status" value="keluar"> keluar&nbsp;&nbsp;
    
  </div>
  <div class="form-group">
    <label for="nama">Password</label>
    <input type="text" required name="password" class="form-control" placeholder="Password">
  </div>
 
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Siswa</button>
</form>
<div class="clear" style="clear:both;"></div>

<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $jk = $_POST['jk'];
  
  $tempat = $_POST['tempat'];
  $tanggal = date('Y-m-d',strtotime($_POST['tanggal']));
  
  $alamat = $_POST['alamat'];
  $telp = $_POST['telp'];
  $agama = $_POST['agama'];
  $status = $_POST['status'];
  $jurusan = $_POST['jurusan'];
  $password = $_POST['password'];


  $fotonama = str_replace(' ', '-', $nis.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/siswa/'.$fotonama);

 
$cek = "SELECT * FROM siswa where kd_siswa='$id'";
$sql = $conn->query($cek);
 if($sql->num_rows > 0){
$maxId = $conn->query("SELECT MAX(kd_siswa) AS max_id FROM siswa");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "S"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);

   $sql = "INSERT INTO siswa VALUES ('$id','$nis','$nama','$jk',
    '$tempat','$tanggal','$alamat','$telp','$fotonama','$agama','$jurusan','$status','$password')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=siswa");
  }
}else{ 

  $sql = "INSERT INTO siswa VALUES ('$id','$nis','$nama','$jk',
    '$tempat','$tanggal','$alamat','$telp','$fotonama','$agama','$jurusan','$status','$password')";
  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=siswa");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

