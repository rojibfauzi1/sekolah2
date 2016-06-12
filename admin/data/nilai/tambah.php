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
function tampil_tahun(){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM tahun";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_tahun']."'>".$row['tahun']."</option>";
  }
}
function tampil_mapel(){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM gurumapel 
   join mapel on mapel.kd_mapel=gurumapel.kd_mapel
   join guru on gurumapel.kd_guru=guru.kd_guru
   where guru.nama_guru = '$_SESSION[nama_guru]'";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_mapel']."'>".$row['mapel']."</option>";
  }
}
function tampil_kategorinilai(){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM kategorinilai";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_kategorinilai']."'>".$row['jenis_nilai']."</option>";
  }
}
?>
<div class="judul">
  <h2>Tambah Nilai</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=tambahList">
 
<div class="well">
  <div class="form-group">
      Dari
      <label for="nama">Kelas</label><br/>
      <select name="kelas" class="form-control" id="kelas_ajax">
        <?php tampil_kelas(); ?>
      </select><br/>
     <label for="nama">Tahun</label><br/>
      <select name="tahun" class="form-control" id="tahun_ajax">
        <?php tampil_tahun(); ?>
      </select><br/>
     <!-- <label for="nama">Semester</label><br/>
      <select name="semester" class="form-control" id="tahun_ajax">
        <option value="genap">Genap</option>
        <option value="ganjil">Ganjil</option>
      </select><br/> -->
      <label for="nama">Mata Pelajaran</label><br/>
      <select name="mapel" class="form-control" id="tahun_ajax" required>
        <?php tampil_mapel(); ?>
      </select><br/>
      <!-- <label for="nama">Kategori Nilai</label><br/>
      <select name="kategorinilai" class="form-control" id="tahun_ajax">
        <?php tampil_kategorinilai(); ?>
      </select><br/> -->
    <!--   <input type="text" id="nama_ajax" /> -->
  </div>
</div>  
<br/>


 
  <button type="submit" name="kirim" class="btn btn-primary">Tambah </button>
</form>
<div class="clear" style="clear:both;"></div><br/><br/><br/>


 

<script type="text/javascript">
 /* $('#kelas_ajax').change(function(){
      $.ajax({
        url   :  'http://localhost/Jfolder%20jitc/jitc2/sekolah/admin/data/siswakelas/siswakelas_ajax.php',
        type  :  'POST',
        dataType  :   'html',
        data      :   'siswa=kelas&kd_kelas='+$("#kelas_ajax").val(),
        success   :   function(data){
          $('#nama_ajax').val(data);
        }
      });
  });*/

</script>

