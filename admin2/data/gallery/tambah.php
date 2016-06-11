<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  
  $lokasi = $_POST['lokasi'];
  
  
  

  $fotonama = str_replace(' ', '-', $id.'-'.$lokasi.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/gallery/'.$fotonama) ;

$cek = "SELECT * FROM galeri where id_galeri='$id'";
$sql = $conn->query($cek);
 if($sql->num_rows > 0){
$maxId = $conn->query("SELECT MAX(id_galeri) AS max_id FROM galeri");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "G"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);


  $sql = "INSERT INTO galeri 
  VALUES ('$id','$fotonama','$lokasi')";
  $s = $conn->query($sql);
  if($s){
    
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=gallery");
  }
}else{

  $sql = "INSERT INTO galeri 
  VALUES ('$id','$fotonama','$lokasi')";
  $s = $conn->query($sql);
  if($s){
  	
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=gallery");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

