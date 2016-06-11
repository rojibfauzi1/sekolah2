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
  $kd_tahun = $_POST['tahun'];
  $kd_kelas = $_POST['kelas'];


$sql1 = "SELECT * FROM wali where kd_tahun='$kd_tahun' and kd_kelas='$kd_kelas'";
  $s = $conn->query($sql1);
  $row= $s->fetch_assoc();
$kd_wali = $row['kd_wali'];
/*print_r($kd_wali);
die();*/



  $jum = count($_POST['pilih']);

  foreach($_POST['pilih'] as $key => $id){

/*
$maxId = $conn->query("SELECT MAX(kd_siswakelas) AS max_id FROM siswakelas");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "A"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);*/
     /* $tabel = "siswakelas";
      $field = array(
        "kd_wali"=>"'".$kd_wali."'",
        "kd_siswa"=>"'".$siswa."'"
        );*/
     

   $sql = "INSERT INTO siswakelas (kd_wali,kd_siswa) VALUES ('$kd_wali','$id')";
   $s = $conn->query($sql);
/*print_r($sql);
die();*/

  }
  /*echo "<script>window.location='?p=siswakelas'</script>";*/
}

?>
<?php ob_flush(); ?>