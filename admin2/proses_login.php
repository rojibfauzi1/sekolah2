<?php
require_once('../conf/koneksi.php');
if(!empty($_POST['login'])){
  $user = $_POST['username'];
  $pass1 = md5($_POST['password']);

  

  $s1 = "SELECT * FROM admin WHERE username='$user' and password='$pass1'";
  $sql1 = $conn->query($s1);
  




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
        header("Refresh: 0; URL=index.php?p=dasboard_admin");
       
     /* } */  
     /* elseif ($_SESSION['level']=='guru') {
        
        header("Refresh: 0; URL=../admin/guru.php");
      }*/
    }

  }else{
      echo "<script>window.alert('gagal login username / password salah')</script>";
    }
}
?>