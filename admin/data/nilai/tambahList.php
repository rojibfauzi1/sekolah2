<h2>Tambah List Siswa Kelas</h2>
<form method="post" action="?p=tambahData">
<table >
  <thead>
    <th>NO</th>
    <th>Nama</th>
    <th>Nilai</th>
  </thead>
 <?php
    /*$kd_kelas = 'K001';*/
  $kd_kelas = $_POST['kelas'];
  $kd_tahun = $_POST['tahun'];
  $kd_mapel = $_POST['mapel'];
 /* $semester = $_POST['semester'];
  $kd_kategori = $_POST['kategorinilai'];*/
  //kd_kelas = 'K002';
/*print_r($kd_kelas);
die();*/
 /* $sql = $conn->query("select * from nilai
   join gurumapel on nilai.kd_gurumapel=gurumapel.kd_gurumapel
   join kelas on gurumapel.kd_kelas=kelas.kd_kelas
   join tahun on gurumapel.kd_tahun=tahun.kd_tahun
   join mapel on gurumapel.kd_mapel=mapel.kd_mapel
   join siswa on nilai.kd_siswa=siswa.kd_siswa
   join kategorinilai on nilai.kd_kategorinilai=kategorinilai.kd_kategorinilai
   where kelas.kd_kelas = '$kd_kelas' and tahun.kd_tahun = '$kd_tahun' and nilai.semester ='$semester'
   and mapel.kd_mapel ='$kd_mapel' and kategorinilai.kd_kategorinilai ='$kd_kategori'");*/


$sql = $conn->query("select * from gurumapel
   join kelas on kelas.kd_kelas=gurumapel.kd_kelas
   join wali on wali.kd_kelas=kelas.kd_kelas
   join siswakelas on wali.kd_wali = siswakelas.kd_wali
   join siswa on siswakelas.kd_siswa=siswa.kd_siswa
  join tahun on gurumapel.kd_tahun=tahun.kd_tahun
    join mapel on gurumapel.kd_mapel=mapel.kd_mapel
    join guru on gurumapel.kd_guru=guru.kd_guru
  

   where guru.nama_guru='$guru' and kelas.kd_kelas = '$kd_kelas' and tahun.kd_tahun='$kd_tahun' and mapel.kd_mapel='$kd_mapel'");
  $no = 0;
$maxId = $conn->query("SELECT MAX(kd_nilai) AS max_id FROM nilai");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "N"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);
  foreach($sql as $data){
    $no++;
    /*$idBaru++;*/
/*ECHO '<tr>
      <td>'.$no.'</td>
      <td>'.$data['nama_siswa'].'</td>
      <td align="center" >
        ';
        if(isset($data['kd_nilai'])){ 
                  echo '<input type="number" name="pilih[]" value='.$data['nilai'].'>
        ';} 
        echo '</td>           
    </tr>';*/

      
ECHO '<tr>
<input type="hidden" name="id" value="'. $idBaru .'" />
        <input type="hidden" name="guru" value="'. $data['kd_gurumapel'] .'" />
      <td>'.$no.'</td>
      <td><input type="text"  readOnly value="'.$data['nama_siswa'].'"/></td>
      
      <input type="hidden" name="siswa" readOnly value="'.$data['kd_siswa'].'"/>
      

      <td align="center" >
        ';
        if(isset($idBaru)){ 
                  echo '<input type="number" name="pilih[]" >
        ';} 
        echo '</td>  

    </tr>';
  }
  ?>
</table>
<!-- pindah -->
<?php
/*function tampil_guru(){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM gurumapel join guru on gurumapel.kd_guru=guru.kd_guru";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_gurumapel']."'>".$row['nama_guru']."</option>";
  }
}*/
/*function tampil_siswa(){
include '../conf/koneksi.php';
  $sql = "SELECT siswa.kd_siswa,siswa.nama_siswa FROM siswa
      left join siswakelas on siswakelas.kd_siswa=siswa.kd_siswa where siswakelas.kd_siswa is null";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_siswa']."'>".$row['nama_siswa']."</option>";
  }
}*/
function tampil_kategori(){
include '../conf/koneksi.php';
  $sql = "SELECT * FROM kategorinilai";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_kategorinilai']."'>".$row['jenis_nilai']."</option>";
  }
}


?>
<div class="well">
  <div class="form-group">
      
    
      
    
      <label for="nama">Kategori</label><br/>
      <select name="kategorinilai" class="form-control">
        <?php tampil_kategori(); ?>
      </select><br/>
      <label for="nama">Semester</label><br/>
      <select name="semester" class="form-control">
        <option value="ganjil">Ganjil</option>
        <option value="genap">Genap</option>
      </select><br/>
  </div>  
</div>
<button type="submit" name="kirim" class="btn btn-primary">Simpan</button>
</form>