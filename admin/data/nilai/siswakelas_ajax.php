<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'jitc3';

$conn = new Mysqli($host,$user,$pass,$db);

if($conn->connect_error){
	echo "Gagal Koneksi";
}

if($_POST['siswa'] == 'siswakelas'){
	$kd_siswakelas = $_POST['kd_siswakelas'];

	echo $kd_siswakelas;

}elseif($_POST['siswa'] == 'kelas'){
	$kd_kelas = $_POST['kd_kelas'];
/*	$kd_kelas = $_POST['kd_kelas'];*/
	//kd_kelas = 'K002';

	$sql = $conn->query("select * from siswa
join siswakelas on siswa.kd_siswa=siswakelas.kd_siswa
join wali on siswakelas.kd_wali=wali.kd_wali
join kelas on wali.kd_kelas=kelas.kd_kelas where kelas.kd_kelas = '$kd_kelas'");
	foreach($sql as $data){
ECHO "<tr>
      <td>1</td>
      <td>".$data['nama_siswa']."</td>
      <td>sxads</td>
    </tr>";
	}
	/*echo "<script>alert('jsahja');</script>";*/
	/*select siswa.nama_siswa from siswa
join siswakelas on siswa.kd_siswa=siswakelas.kd_siswa
join wali on siswakelas.kd_wali=wali.kd_wali
join kelas on wali.kd_kelas=kelas.kd_kelas*/

}

?>