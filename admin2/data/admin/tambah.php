<?php 

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);

 
  
  $fotonama = str_replace(' ', '-', $id.'-'.$username.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/admin/'.$fotonama) ;

$cek = "SELECT * FROM admin where id_admin='$id'";
$sql = $conn->query($cek);
 if($sql->num_rows > 0){
$maxId = $conn->query("SELECT MAX(id_admin) AS max_id FROM admin");
        
        $id=$maxId->fetch_assoc();
        $id_max = $id['max_id'];
        
        $id_belakang = (int) substr($id_max, 1, 3);
        $id_belakang++;
        
        $id_awal = "A"; 
        $idBaru = $id_awal . sprintf("%03s", $id_belakang);


  $sql = "INSERT INTO admin VALUES ('$id','$nama','$username','$password','$fotonama')";
/*print_r($sql);
die();*/

  $s = $conn->query($sql);
  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
     header("Refresh: 0; URL=?p=admin");
  }
}else{

  $sql = "INSERT INTO admin VALUES ('$id','$nama','$username','$password','$fotonama')";

  $s = $conn->query($sql);
/*print_r($s);
die();*/
  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=admin");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

