<?php  ob_start(); ?>
<div class="judul">
  <h2>Nilai</h2>
</div>
<?php
/*$selectIdMax = $conn->query("SELECT max(kd_siswa) as maxIdSiswa FROM siswa where kd_siswa like 'S%'");
  $hslIdMax = $selectIdMax->fetch_assoc();
  $idMax = $hslIdMax['maxIdSiswa'];

  $nourut = (int)substr($idMax, 1,2);
  $nourut++;
  $idBaru = "S".sprintf("%03s",$nourut);*/


function tampil_kelas(){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM kelas ";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_kelas']."'>".$row['nama_kelas']."</option>";
  }
}
/*function tampil_siswa(){
include '../conf/koneksi.php';
  $sql = "SELECT siswa.kd_siswa,siswa.nama_siswa FROM siswa
      left join siswakelas on siswakelas.kd_siswa=siswa.kd_siswa where siswakelas.kd_siswa is null";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_siswa']."'>".$row['nama_siswa']."</option>";
  }
}*/

function tampil_jurusan(){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM jurusan";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_jurusan']."'>".$row['nama_jurusan']."</option>";
  }
}
function tampil_tahun(){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM tahun";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_tahun']."'>".$row['tahun']."</option>";
  }
}
?>

<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=cari_nilai">
 
<div class="well">
  <div class="form-group">
      Dari
      <label for="nama">Kelas</label><br/>
      <select name="kelas" class="form-control" id="kelas_ajax">
        <?php tampil_kelas(); ?>
      </select><br/>
     
      <label for="nama">Jurusan</label><br/>
      <select name="jurusan" class="form-control" id="tahun_ajax">
        <?php tampil_jurusan(); ?>
      </select><br/>


     <label for="nama">Tahun</label><br/>
      <select name="tahun" class="form-control" id="tahun_ajax">
        <?php tampil_tahun(); ?>
      </select><br/>
  </div>
</div>  
<br/>


 
  <button type="submit" name="kirim" class="btn btn-primary">Cari</button>
</form>
<div class="clear" style="clear:both;"></div>
<br/><br/>
<a href="data/laporan_siswa/cetak.php" class="btn btn-primary">Cetak</a>
<br/><br/>
<table class="table table-striped">
  <thead>
    
  <tr>
    <th>No</th>
    <th>Jurusan</th>
    <th>Kelas</th>
    <th>Nama Siswa</th>
 
   
  </tr>
  </thead>
  <tbody>
    
  <?php
  $no = 1;
  $sql = "SELECT * FROM siswa
        join siswakelas on siswa.kd_siswa=siswakelas.kd_siswa
        join wali on siswakelas.kd_wali=wali.kd_wali
        join tahun on wali.kd_tahun=tahun.kd_tahun
        join kelas on wali.kd_kelas=kelas.kd_kelas
        join jurusan on siswa.kd_jurusan=jurusan.kd_jurusan";
  $s = $conn->query($sql);
  while($row=$s->fetch_assoc()){
  ?>
  <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $row['nama_jurusan'] ?></td>
        <td><?php echo $row['nama_kelas'] ?></td>
    <td><?php echo $row['nama_siswa'] ?></td>
   
  </tr>
  <?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>

