<?php
/*$selectIdMax = $conn->query("SELECT max(kd_siswa) as maxIdSiswa FROM siswa where kd_siswa like 'S%'");
  $hslIdMax = $selectIdMax->fetch_assoc();
  $idMax = $hslIdMax['maxIdSiswa'];

  $nourut = (int)substr($idMax, 1,2);
  $nourut++;
  $idBaru = "S".sprintf("%03s",$nourut);*/

$maxId = $conn->query("SELECT MAX(kd_siswakelas) AS max_id FROM siswakelas");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "A"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);
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
?>
<div class="judul">
  <h2>Tambah Siswa Kelas</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=tambahList">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
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
      </select>
    <!--   <input type="text" id="nama_ajax" /> -->
  </div>
</div>  
<br/>


 
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Siswa Kelas</button>
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

