<?php 
session_start();
ob_start(); 
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'jitc3';

$conn = new Mysqli($host,$user,$pass,$db);

if($conn->connect_error){
	echo "Gagal Koneksi";
}
$sql = $conn->query("SELECT * FROM siswa
        join siswakelas on siswa.kd_siswa=siswakelas.kd_siswa
        join wali on siswakelas.kd_wali=wali.kd_wali
        join tahun on wali.kd_tahun=tahun.kd_tahun
        join kelas on wali.kd_kelas=kelas.kd_kelas
        join jurusan on siswa.kd_jurusan=jurusan.kd_jurusan");



$column_no = "";
$column_nama = "";
$column_jurusan = "";
$column_kelas = "";


$no = 1;
while ($row = $sql->fetch_assoc()) {
	
	$nama =    $row['nama_siswa'];
	$jurusan =   $row['nama_jurusan']; 
	$kelas =   $row['nama_kelas']; 
	 	

$column_no = $column_no.$no."\n";
$column_nama = $column_nama.$nama."\n";

$column_jurusan = $column_jurusan.$jurusan."\n";

$column_kelas = $column_kelas.$kelas."\n";

require_once ('fpdf/fpdf.php');

$pdf = new FPDF(); /*P = potrait || L = Landscape*/
$pdf->AddPage();
/*Menambahkan Gambar*/
/*$pdf->Image('../foto/logo/logo.jpg',10,10,-175);*/

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'Daftar Siswa',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,'SMKN TEPUS',0,0,'C');
$pdf->Ln();


/*Fields Name position*/

$Y_Fields_Name_Position = 30;

	/*mapel,jurusan,jenis_kelas,kelas*/
//First Create each Fields Name
//Gray color filling each name box
$pdf->SetFillColor(110,180,230);
//Bold Font for field name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_Position);
$pdf->SetX(5);
$pdf->Cell(25,8,'NO',1,0,'C',1);
$pdf->SetX(30);
$pdf->Cell(40,8,'Nama',1,0,'C',1);
$pdf->SetX(70);
$pdf->Cell(25,8,'jurusan',1,0,'C',1);

$pdf->SetX(95);
$pdf->Cell(25,8,'kelas',1,0,'C',1);
$pdf->Ln();

$no++;}

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',10);
/*mapel,jurusan,jenis_kelas,kelas*/
$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(25,6,$column_no,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(30);
$pdf->MultiCell(40,6,$column_nama,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(70);
$pdf->MultiCell(25,6,$column_jurusan,1,'C');


$pdf->SetY($Y_Table_Position);
$pdf->SetX(95);
$pdf->MultiCell(25,6,$column_kelas,1,'C');

$pdf->Output();
?>