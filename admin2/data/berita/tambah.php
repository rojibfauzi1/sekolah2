<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];

  $judul = $_POST['judul'];
  $isi = $_POST['isi'];
  $tips = $_POST['tips'];
  $tempat = $_POST['tempat'];
  $tanggal =  date('Y-m-d H:i:s');

  $pengirim = $_SESSION['username'];

$fotonama = str_replace(' ', '-', $id.'-'.$judul.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/berita/'.$fotonama) ;

 
$cek = "SELECT * FROM berita where id_berita='$id'";
$sql = $conn->query($cek);
 if($sql->num_rows > 0){
$maxId = $conn->query("SELECT MAX(id_berita) AS max_id FROM berita");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "B"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);


 $sql = "INSERT INTO berita(id_berita,judul,deskripsi,tanggal,pengirim,tips_wisata,tempat_wisata) 
  VALUES ('$id','$judul','$isi','$tanggal','$pengirim','$tips','$tempat',gambar='$fotonama')";
  $s = $conn->query($sql);
  if($s){
    
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=berita");
  }
}else{

 $sql = "INSERT INTO berita(id_berita,judul,deskripsi,tanggal,pengirim,tips_wisata,tempat_wisata) 
  VALUES ('$id','$judul','$isi','$tanggal','$pengirim','$tips','$tempat',gambar='$fotonama')";
  $s = $conn->query($sql);
  if($s){
  	
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=berita");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>


