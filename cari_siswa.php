<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: School Education
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sekolah</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="asset/styles/layout.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="asset/css/custom.css">
<link rel="stylesheet" type="text/css" href="asset/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" type="text/css" href="asset/DataTables/DataTables-1/css/jquery.dataTables.min.css">
<script type="text/javascript" src="asset/scripts/jquery.min.js"></script>
<script type="text/javascript" src="asset/scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="asset/DataTables/DataTables-1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="asset/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="asset/ckeditor/ckeditor.js"></script>
<!-- Homepage Only Scripts -->
<script type="text/javascript" src="asset/scripts/jquery.cycle.min.js"></script>
<script type="text/javascript">
$(function() {
    $('#featured_slide').after('<div id="fsn"><ul id="fs_pagination">').cycle({
        timeout: 5000,
        fx: 'fade',
        pager: '#fs_pagination',
        pause: 1,
        pauseOnPagerHover: 0
    });
    $('#datepicker1').datepicker({
      formatSubmit: 'Y-m-d',
      hiddenName: true,
      format: 'yyyy-mm-dd'
  });
   $('#datepicker').datepicker({
      formatSubmit: 'Y-m-d',
      hiddenName: true,
      format: 'yyyy-mm-dd'
  });

});
$(document).ready(function(){
    $('table').DataTable();
});

</script>
<!-- End Homepage Only Scripts -->
</head>
<?php 

include 'header.php'; ?>
<body>
<?php 
include 'conf/koneksi.php';
include 'asset/php/login.php';
include 'asset/php/header.php';

function tampil_kelas(){
include 'conf/koneksi.php';
  $sql = "SELECT * FROM kelas ";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_kelas']."'>".$row['nama_kelas']."</option>";
  }
}
function tampil_jurusan(){
include 'conf/koneksi.php';
  $sql = "SELECT * FROM jurusan ";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_jurusan']."'>".$row['nama_jurusan']."</option>";
  }
}
function tampil_tahun(){
include 'conf/koneksi.php';
  $sql = "SELECT * FROM tahun ";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['kd_kelas']."'>".$row['tahun']."</option>";
  }
}
 ?>

<div class="wrapper col3">
  <div id="homecontent">
    <div class="fl_right">
    <h2>Direktori Siswa</h2>
      <div class="column2">
      <?php
      $kelas = $_POST['kelas'];
      $jurusan = $_POST['jurusan'];
      $tahun = $_POST['tahun'];
      ?>
            <br/>
            <br/><br/>
            <table class="table table-striped">
              <thead>
                
              <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>

                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Alamat</th>
              </tr>
              </thead>
              <tbody>
                
              <?php
              $no = 1;
              $sql = "SELECT * FROM siswa
              join siswakelas on siswa.kd_siswa=siswakelas.kd_siswa
              join wali on siswakelas.kd_wali=wali.kd_wali
              join kelas on wali.kd_kelas=kelas.kd_kelas
              join tahun on wali.kd_tahun=tahun.kd_tahun
              join jurusan on kelas.kd_jurusan=jurusan.kd_jurusan WHERE kelas.kd_kelas='".$kelas."' and jurusan.kd_jurusan='".$jurusan."' and tahun.kd_tahun='".$tahun."' ";
              $s = $conn->query($sql);
              while($row=$s->fetch_assoc()){
              ?>
              <tr>
                <td><?php echo $no; ?></td>
              <td><?php echo $row['nis'] ?></td>
                <td><?php echo $row['nama_siswa'] ?></td>
                <td><?php echo $row['nama_kelas'] ?></td>
                <td><?php echo $row['nama_jurusan'] ?></td>
                <td><?php echo substr($row['alamat'], 0,20)  ?></td>
                
              </tr>
              <?php $no++; } ?>
              </tbody>
            </table>
            <div class="bawah" style="margin-bottom:100px;"></div>

        <br class="clear" />
      </div>
      
    </div>
    <?php include 'sidebar.php'; ?>
   <br class="clear" />
  </div>
</div>

<?php include 'asset/php/footer2.php' ?>
<!-- ####################################################################################################### -->
<?php include 'asset/php/footer.php'; ?>