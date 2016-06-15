<?php
require_once('conf/koneksi.php');
if(!empty($_POST['login'])){
  $user = $_POST['username'];
  $pass1 = $_POST['password'];

  

  $s1 = "SELECT * FROM admin WHERE username='$user' and password='$pass1'";
  $sql1 = $conn->query($s1);
  
 $nip = $_POST['username'];
  $pass2 = $_POST['password'];

 $s2 = "SELECT * FROM guru left join gurumapel on guru.kd_guru=gurumapel.kd_guru WHERE nip='$nip' and password='$pass2'";
  $sql2 = $conn->query($s2);
$cek2 = $sql2->num_rows;

 $nis = $_POST['username'];
  $pass3 = $_POST['password'];

$s3 = "SELECT * FROM siswa WHERE nis='$nis' and password='$pass3'";
  $sql3 = $conn->query($s3);
$cek3 = $sql3->num_rows;



  $cek1 = $sql1->num_rows;
  if($cek1){
    $row = $sql1->fetch_assoc();
    if($cek1 > 0){
      $_SESSION['login'] = 1;
      $_SESSION['username'] = $user;
      $_SESSION['password'] = $pass1;
    /*  $_SESSION['level'] = $row['level'];*/
      $_SESSION['gambar'] = $row['foto'];
      
    /*  if($_SESSION['level']=='admin'){*/
        header("Refresh: 0; URL=admin/index.php?p=dasboard_admin");
       
     /* } */  
     /* elseif ($_SESSION['level']=='guru') {
        
        header("Refresh: 0; URL=../admin/guru.php");
      }*/
    }

  }elseif($cek2){
    $row = $sql2->fetch_assoc();
    if($sql2 > 0){
      $_SESSION['login'] = 2;
      $_SESSION['nip'] = $nip;
      $_SESSION['password'] = $pass2;
      $_SESSION['nama_guru'] = $row['nama_guru'];
      $_SESSION['kd_guru'] = $row['kd_guru'];
           $_SESSION['kd_gurumapel'] = $row['kd_gurumapel'];
      $_SESSION['gambar'] = $row['foto'];
      $_SESSION['jenis_kelamin'] = $row['jenis_kelamin'];
      $_SESSION['tempat_lahir'] = $row['tempat_lahir'];
      $_SESSION['tanggal_lahir'] = $row['tanggal_lahir'];
      $_SESSION['alamat'] = $row['alamat'];
      $_SESSION['no_telepon'] = $row['no_telepon'];
      $_SESSION['alamat'] = $row['alamat'];
      $_SESSION['agama'] = $row['agama'];
      $_SESSION['pendidikan'] = $row['pendidikan'];

      if($cek2 > 0){

      $s4 = "SELECT * FROM wali 
      join guru on wali.kd_guru=guru.kd_guru WHERE guru.kd_guru='".$row['kd_guru']."'";

      $sql4 = $conn->query($s4);
      $cek4 = $sql4->num_rows;
      /*print_r($cek4);
      die();*/
      if($cek4){
    $row = $sql4->fetch_assoc();
    
    if($sql4 > 0){
      $_SESSION['login'] = 4;
      $_SESSION['nip'] = $nip;
      $_SESSION['password'] = $pass2;
      $_SESSION['nama_guru'] = $row['nama_guru'];
      $_SESSION['kd_guru'] = $row['kd_guru'];
      $_SESSION['gambar'] = $row['foto'];
      $_SESSION['jenis_kelamin'] = $row['jenis_kelamin'];
      $_SESSION['tempat_lahir'] = $row['tempat_lahir'];
      $_SESSION['tanggal_lahir'] = $row['tanggal_lahir'];
      $_SESSION['alamat'] = $row['alamat'];
      $_SESSION['no_telepon'] = $row['no_telepon'];
      $_SESSION['alamat'] = $row['alamat'];
      $_SESSION['agama'] = $row['agama'];
      $_SESSION['pendidikan'] = $row['pendidikan'];
/*
        if($sql3 > 0){
      $_SESSION['login'] = 4;
      $_SESSION['nip'] = $nip;
      $_SESSION['password'] = $pass2;
      $_SESSION['nama_guru'] = $row['nama_guru'];
      $_SESSION['kd_guru'] = $row['kd_guru'];
      $_SESSION['gambar'] = $row['foto'];
      $_SESSION['jenis_kelamin'] = $row['jenis_kelamin'];
      $_SESSION['tempat_lahir'] = $row['tempat_lahir'];
      $_SESSION['tanggal_lahir'] = $row['tanggal_lahir'];
      $_SESSION['alamat'] = $row['alamat'];
      $_SESSION['no_telepon'] = $row['no_telepon'];
      $_SESSION['alamat'] = $row['alamat'];
      $_SESSION['agama'] = $row['agama'];
      $_SESSION['pendidikan'] = $row['pendidikan'];*//*}*/
      header("Refresh: 0; URL=admin/wali.php?p=dasboard_wali"); /*}*/
      }

        header("Refresh: 0; URL=admin/guru.php?p=dasboard_guru");
       
   
    }
  }elseif($cek3){
    $row = $sql3->fetch_assoc();
    if($sql3 > 0){
      $_SESSION['login'] = 3;
      $_SESSION['nis'] = $nis;
      $_SESSION['password'] = $pass3;
      $_SESSION['nama_siswa'] = $row['nama_siswa'];
      $_SESSION['kd_siswa'] = $row['kd_siswa'];
      $_SESSION['gambar'] = $row['foto'];
      $_SESSION['jenis_kelamin'] = $row['jenis_kelamin'];
      $_SESSION['tempat_lahir'] = $row['tempat_lahir'];
      $_SESSION['tanggal_lahir'] = $row['tanggal_lahir'];
      $_SESSION['alamat'] = $row['alamat'];
      $_SESSION['no_telepon'] = $row['no_telepon'];
      $_SESSION['alamat'] = $row['alamat'];
      $_SESSION['agama'] = $row['agama'];
      

        header("Refresh: 0; URL=admin/siswa.php?p=dasboard_siswa");
       
   
    }
  }else{
      echo "<script>window.alert('gagal login username / password salah')</script>";
    }
}
?>