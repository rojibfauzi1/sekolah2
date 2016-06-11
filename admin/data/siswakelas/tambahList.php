<h2>Tambah List Siswa Kelas</h2>
<form method="post" action="?p=tambahData">
<table >
  <thead>
    <th>NO</th>
    <th>Nama</th>
    <th>Mapel</th>
  </thead>
 <?php
    /*$kd_kelas = 'K001';*/
  $kd_kelas = $_POST['kelas'];
  $kd_tahun = $_POST['tahun'];
  //kd_kelas = 'K002';
/*print_r($kd_kelas);
die();*/
  $sql = $conn->query("select * from siswa
join siswakelas on siswa.kd_siswa=siswakelas.kd_siswa
join wali on siswakelas.kd_wali=wali.kd_wali
join tahun on wali.kd_tahun=tahun.kd_tahun
join kelas on wali.kd_kelas=kelas.kd_kelas where wali.kd_kelas = '$kd_kelas' and tahun.kd_tahun= '$kd_tahun'");
  /*print_r($_POST);
  die();*/
  

  $no = 0;
  foreach($sql as $data){
    $no++;
ECHO '<tr>
      <td>'.$no.'</td>
      <td>'.$data['nama_siswa'].'</td>
      <td align="center" >
        ';
        if(isset($data['kd_siswakelas'])){ 
                  echo '<input type="checkbox" name="pilih[]" value='.$data['kd_siswa'].'>
        ';} 
        echo '</td>           
    </tr>';
  }
  ?>
</table>

<?php
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
<div class="well">
  <div class="form-group">
      Ke
      <label for="nama">Kelas</label><br/>
      <select name="kelas" class="form-control">
        <?php tampil_kelas(); ?>
      </select><br/>
      <label for="nama">Tahun</label><br/>
      <select name="tahun" class="form-control">
        <?php tampil_tahun(); ?>
      </select><br/>
  </div>  
</div>
<button type="submit" name="kirim" class="btn btn-primary">Simpan</button>
</form>