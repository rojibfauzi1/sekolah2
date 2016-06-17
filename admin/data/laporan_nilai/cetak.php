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
$sql = $conn->query("SELECT * FROM nilai
  			join siswa on nilai.kd_siswa=siswa.kd_siswa
  			join gurumapel on nilai.kd_gurumapel=gurumapel.kd_gurumapel
  			join mapel on gurumapel.kd_mapel=mapel.kd_mapel

  			join kategorinilai on nilai.kd_kategorinilai=kategorinilai.kd_kategorinilai ");



$column_no = "";
$column_nama = "";
$column_mapel = "";
$column_semester = "";
$column_jenis_nilai = "";
$column_nilai = "";

$no = 1;
while ($row = $sql->fetch_assoc()) {
	
	$nama =    $row['nama_siswa'];
	$mapel =   $row['mapel']; 
	$semester =   $row['semester']; 
	$jenis_nilai =    $row['jenis_nilai'];
	$nilai =    $row['nilai']; 	

$column_no = $column_no.$no."\n";
$column_nama = $column_nama.$nama."\n";
$column_mapel = $column_mapel.$mapel."\n";
$column_semester = $column_semester.$semester."\n";
$column_jenis_nilai = $column_jenis_nilai.$jenis_nilai."\n";
$column_nilai = $column_nilai.$nilai."\n";

require_once ('fpdf/fpdf.php');

$pdf = new FPDF(); /*P = potrait || L = Landscape*/
$pdf->AddPage();
/*Menambahkan Gambar*/
/*$pdf->Image('../foto/logo/logo.jpg',10,10,-175);*/

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'Nilai Siswa',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,'SMKN TEPUS',0,0,'C');
$pdf->Ln();


/*Fields Name position*/

$Y_Fields_Name_Position = 30;

	/*mapel,semester,jenis_nilai,nilai*/
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
$pdf->Cell(25,8,'Semester',1,0,'C',1);
$pdf->SetX(95);
$pdf->Cell(25,8,'Jenis Nilai',1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(25,8,'Nilai',1,0,'C',1);
$pdf->Ln();

$no++;}

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',10);
/*mapel,semester,jenis_nilai,nilai*/
$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(25,6,$column_no,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(30);
$pdf->MultiCell(40,6,$column_nama,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(70);
$pdf->MultiCell(25,6,$column_semester,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(95);
$pdf->MultiCell(25,6,$column_jenis_nilai,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(120);
$pdf->MultiCell(25,6,$column_nilai,1,'C');

$pdf->Output();
?>