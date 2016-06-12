
<!-- if(isset($_POST['kirim'])){
 $id = $_POST['id'];
 $siswa = $_POST['siswa'];
 $kategori = $_POST['kategorinilai'];
 $gurumapel = $_POST['gurumapel'];
 $semester = $_POST['semester'];
 $nilai = $_POST['nilai'];


  foreach($_POST['id'] as $key => $id){
      $tabel = "nilai";
      $field = array("kd_nilai"=>"'".$id."'",
        "kd_siswa"=>"'".$siswa."'",
        "kd_kategorinilai"=>"'".$kategori."'",
        "kd_gurumapel"=>"'".$gurumapel."'",
        "semester"=>"'".$semester."'",
        "nilai"=>"'".$nilai."'"
        );
      /*print_r($field);
      die();*/
      tambah($field,$tabel);
  }
  echo "<script>window.location='?p=nilai'</script>";
}
/* $sql = "INSERT INTO nilai VALUES ('$id','$siswa','$kategori','$gurumapel',
    '$semester','$nilai')";
print_r($sql);
die();
  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=nilai");
  }*/
 -->

<?php ob_flush(); ?>
<?php
/*function tambah($table,$field){
  include '../sekolah/conf/koneksi.php';
  $strfield= array();
  $strvalue= array();

  foreach ($field as $fld => $value) {
    $strfield[] = $fld;
    $strvalue[] = $val;
  }

  $stringfield = implode(",", $stringfield);
  $stringvalue = implode(",", $stringvalue);
  $query = $conn->query("INSERT INTO $table ($stringfield) values ($stringvalue)");
  if($query){
    return true;
  }else{
    return false;
  }
}*/
/*if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $wali = $_POST['wali'];
  $siswa = $_POST['siswa'];


 
$cek = "SELECT * FROM siswakelas where kd_siswakelas='$id'";
$sql = $conn->query($cek);
 if($sql->num_rows > 0){
$maxId = $conn->query("SELECT MAX(kd_siswakelas) AS max_id FROM siswakelas");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "A"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);

   $sql = "INSERT INTO siswakelas VALUES ('$id','$wali','$siswa')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=siswakelas");
  }
}else{ 

 $sql = "INSERT INTO siswakelas VALUES ('$id','$wali','$siswa')";
 $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=siswakelas");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}*/
if(isset($_POST['kirim'])){
 
    
  /*$siswa = $_POST['siswa'];*/
   $id = $_POST['id'];
 $siswa = $_POST['siswa'];
 $kategori = $_POST['kategorinilai'];
 $gurumapel = $_POST['guru'];
 $semester = $_POST['semester'];
 

/*print_r($_POST);
die();*/

/*$sql1 = "SELECT * FROM nilai where kd_kategori='$kategori' and semester='$semester' and kd_gurumapel='$gurumapel'";
  $s = $conn->query($sql1);
  $row= $s->fetch_assoc();*/

/*$kd_wali = $row['kd_wali'];*/
/*print_r($_POST);
die();*/



  $jum = count($_POST['pilih']);

  foreach($_POST['pilih'] as $key => $id){



   $sql = "INSERT INTO nilai (kd_siswa,kd_kategorinilai,kd_gurumapel,semester,nilai) VALUES ('$siswa','$kategori','$gurumapel','$semester','$id')";
   $s = $conn->query($sql);
/*print_r($sql);
die();
*/
  }
  /*echo "<script>window.location='?p=siswakelas'</script>";*/
}

?>
<?php ob_flush(); ?>