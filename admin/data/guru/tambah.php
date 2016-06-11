<?php
/*$selectIdMax = $conn->query("SELECT max(kd_siswa) as maxIdSiswa FROM siswa where kd_siswa like 'S%'");
  $hslIdMax = $selectIdMax->fetch_assoc();
  $idMax = $hslIdMax['maxIdSiswa'];

  $nourut = (int)substr($idMax, 1,2);
  $nourut++;
  $idBaru = "S".sprintf("%03s",$nourut);*/

$maxId = $conn->query("SELECT MAX(kd_guru) AS max_id FROM guru");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "G"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);

?>
<div class="judul">
  <h2>Tambah Guru</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=tambahguru">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">NIP</label>
    <input type="text" required name="nip" class="form-control" placeholder="NIP">
  </div>
  <div class="form-group">
    <label for="nama">Nama Guru</label>
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
      <input type="text" required name="tanggal" id="datepicker1" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
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
    <label for="nama">Pendidikan</label>
    <input type="text" required name="pendidikan" class="form-control" placeholder="Pendidikan">
  </div>
  <div class="form-group">
    <label for="jk">Status</label><br/>
    <input type="radio" name="status_aktif" value="aktif"> aktif&nbsp;&nbsp;&nbsp;&nbsp;  
    <input type="radio" name="status_aktif" value="tidak"> Tidak&nbsp;&nbsp;&nbsp;&nbsp;
  
    
  </div>
   <div class="form-group">
    <label for="jk">Status</label><br/>
    <input type="radio" name="status" value="PNS"> PNS&nbsp;&nbsp;&nbsp;&nbsp;  
    <input type="radio" name="status" value="honorer"> Honorer&nbsp;&nbsp;&nbsp;&nbsp;
  
    
  </div>
  <div class="form-group">
    <label for="nama">Password</label>
    <input type="text" required name="password" class="form-control" placeholder="Password">
  </div>
 
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Guru</button>
</form>
<div class="clear" style="clear:both;"></div>

<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $nip = $_POST['nip'];
  $nama = $_POST['nama'];
  $jk = $_POST['jk'];
  
  $tempat = $_POST['tempat'];
  $tanggal = date('Y-m-d',strtotime($_POST['tanggal']));
  
  $alamat = $_POST['alamat'];
  $telp = $_POST['telp'];
  $agama = $_POST['agama'];
  $pendidikan = $_POST['pendidikan'];
  $status_aktif = $_POST['status_aktif'];
  $status = $_POST['status'];

  $password = $_POST['password'];


  $fotonama = str_replace(' ', '-', $nip.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/guru/'.$fotonama);

 
$cek = "SELECT * FROM guru where kd_guru='$id'";
$sql = $conn->query($cek);
 if($sql->num_rows > 0){
$maxId = $conn->query("SELECT MAX(kd_guru) AS max_id FROM guru");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "G"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);

   $sql = "INSERT INTO guru VALUES ('$id','$nip','$nama','$jk',
    '$tempat','$tanggal','$alamat','$telp','$fotonama','$agama','$pendidikan','$status_aktif','$status','$password')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=guru");
  }
}else{ 

 $sql = "INSERT INTO guru VALUES ('$id','$nip','$nama','$jk',
    '$tempat','$tanggal','$alamat','$telp','$fotonama','$agama','$pendidikan','$status_aktif','$status','$password')";
  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=guru");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

