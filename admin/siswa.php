<?php
session_start();
ob_start(); ?>
<?php
require_once('../conf/koneksi.php');
include '../asset/php/head.php';


/*if(!isset($_SESSION['login'])){
  header("location: login.php");
}*/
$login = $_SESSION['login'];
$nis = $_SESSION['nis'] ;
      
$siswa = $_SESSION['nama_siswa'] ;
$kd_siswa = $_SESSION['kd_siswa'];
$gambar = $_SESSION['gambar'] ;
$jk = $_SESSION['jenis_kelamin'] ;
$tempat = $_SESSION['tempat_lahir'] ;
$tanggal= $_SESSION['tanggal_lahir'] ;
$alamat = $_SESSION['alamat'] ;
$telp =      $_SESSION['no_telepon'] ;
$alamat = $_SESSION['alamat'] ;
$agama = $_SESSION['agama'] ;


if($login != '3'){
  session_destroy();
  /*header("Refresh: 0; URL=../index.php");*/
  header("location: ../index.php");
}

?>

<!-- End Homepage Only Scripts -->

<body>

<div class="wrapper col0">
  <div id="topbar">
    
    <div id="loginpanel">
      <ul>
        <li  class="left"><a style="padding-left:-30px" href="logout.php"> Logout &raquo;</a></li><b><?php echo strtoupper($siswa) ?></b>
          </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<?php include 'header.php'; ?>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="featured_slide">
  <?php 
  $sql = "SELECT * FROM berita order by tanggal desc limit 0,5";
  $s = $conn->query($sql);
  while ($row=$s->fetch_assoc()) {
  ?>  
  
    <div class="featured_box"><a href="#"><img src="../upload/berita/<?php echo $row['gambar'] ?>" alt="" /></a>
      <div class="floater">
        <h2><?php echo $row['judul'] ?></h2>
        <p><?php echo substr($row['isi'], 0,200)  ?></p>
        <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
      </div>
    </div>
  <?php
  }
  ?>
   
  </div>
</div>

<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="homecontent">
  <div class="fl_left">
      <h2>Halaman Siswa</h2>
      <ul class="nav nav-stacked">
        <li><a href="?p=dasboard_siswa">Dashboard</a></li>
        <li><a href="?p=profil_siswa">Profil</a></li>
         <li><a href="?p=nilai_siswa">Nilai</a></li>
        <!--<li><a href="?p=kelas">Kelas</a></li>
        <li><a href="?p=mapel">Mata Pelajaran</a></li>
        <li><a href="?p=jurusan">Jurusan</a></li>
        <li><a href="?p=tahun">Tahun</a></li>
        <li><a href="?p=wali">Wali</a></li>
        <li><a href="?p=guru">Guru</a></li>
        <li><a href="?p=gurumapel">Guru Mapel</a></li>
        <li><a href="?p=siswakelas">Siswa Kelas</a></li>
        <li><a href="?p=kategorinilai">Kategori Nilai</a></li>
        <li><a href="?p=profil">Profil</a></li>
        <li><a href="?p=berita">Berita</a></li>
        <li><a href="?p=kategoriberita">Kategori Berita</a></li> -->
      </ul>
    </div>
    <div class="fl_right">
      <div class="column2">
      <?php
      if(isset($_GET['p'])){
        switch ($_GET['p']) {
          case 'dasboard_siswa':
              $page = 'dasboard_siswa.php';
            break;

          case 'profil_siswa':
              $page = 'profil_siswa/index.php';
            break;
          case 'tambahprofil_guru':
              $page = 'profil_guru/tambah.php';
            break;
          case 'editprofil_siswa':
              $page = 'profil_siswa/edit.php';
            break;
           case 'nilai_siswa':
              $page = 'nilai_siswa/index.php';
            break;
          case 'cari_nilai':
              $page = 'nilai_siswa/cari_nilai.php';
            break;
          case 'editnilai_siswa':
              $page = 'nilai_siswa/edit.php';
            break;
          case 'hapusnilai_siswa':
              $page = 'nilai_siswa/hapus.php';
            break;
           case 'tambahList':
              $page = 'nilai_siswa/tambahList.php';
            break;
          case 'tambahData':
              $page = 'nilai_siswa/tambahData.php';
            break; 
         /* case 'siswa':
              $page = 'siswa/index.php';
            break;
          case 'tambahsiswa':
              $page = 'siswa/tambah.php';
            break;
          case 'editsiswa':
              $page = 'siswa/edit.php';
            break;
          case 'hapussiswa':
              $page = 'siswa/hapus.php';
            break;
          case 'kelas':
              $page = 'kelas/index.php';
            break;
          case 'tambahkelas':
              $page = 'kelas/tambah.php';
            break;
          case 'editkelas':
              $page = 'kelas/edit.php';
            break;
          case 'hapuskelas':
              $page = 'kelas/hapus.php';
            break;
          case 'mapel':
              $page = 'mapel/index.php';
            break;
          case 'tambahmapel':
              $page = 'mapel/tambah.php';
            break;
          case 'editmapel':
              $page = 'mapel/edit.php';
            break;
          case 'hapusmapel':
              $page = 'mapel/hapus.php';
            break;
          case 'jurusan':
              $page = 'jurusan/index.php';
            break;
          case 'tambahjurusan':
              $page = 'jurusan/tambah.php';
            break;
          case 'editjurusan':
              $page = 'jurusan/edit.php';
            break;
          case 'hapusjurusan':
              $page = 'jurusan/hapus.php';
            break;
          case 'tahun':
              $page = 'tahun/index.php';
            break;
          case 'tambahtahun':
              $page = 'tahun/tambah.php';
            break;
          case 'edittahun':
              $page = 'tahun/edit.php';
            break;
          case 'hapustahun':
              $page = 'tahun/hapus.php';
            break;
          case 'wali':
              $page = 'wali/index.php';
            break;
          case 'tambahwali':
              $page = 'wali/tambah.php';
            break;
          case 'editwali':
              $page = 'wali/edit.php';
            break;
          case 'hapuswali':
              $page = 'wali/hapus.php';
            break;
          case 'guru':
              $page = 'guru/index.php';
            break;
          case 'tambahguru':
              $page = 'guru/tambah.php';
            break;
          case 'editguru':
              $page = 'guru/edit.php';
            break;
          case 'hapusguru':
              $page = 'guru/hapus.php';
            break;
          case 'gurumapel':
              $page = 'gurumapel/index.php';
            break;
          case 'tambahgurumapel':
              $page = 'gurumapel/tambah.php';
            break;
          case 'editgurumapel':
              $page = 'gurumapel/edit.php';
            break;
          case 'hapusgurumapel':
              $page = 'gurumapel/hapus.php';
            break;
          case 'siswakelas':
              $page = 'siswakelas/index.php';
            break;
          case 'tambahsiswakelas':
              $page = 'siswakelas/tambah.php';
            break;
          case 'editsiswakelas':
              $page = 'siswakelas/edit.php';
            break;
          case 'hapussiswakelas':
              $page = 'siswakelas/hapus.php';
            break;
          case 'kategorinilai':
              $page = 'kategorinilai/index.php';
            break;
          case 'tambahkategorinilai':
              $page = 'kategorinilai/tambah.php';
            break;
          case 'editkategorinilai':
              $page = 'kategorinilai/edit.php';
            break;
          case 'hapuskategorinilai':
              $page = 'kategorinilai/hapus.php';
            break;
          case 'profil':
              $page = 'profil/index.php';
            break;
          case 'tambahprofil':
              $page = 'profil/tambah.php';
            break;
          case 'editprofil':
              $page = 'profil/edit.php';
            break;
          case 'hapusprofil':
              $page = 'profil/hapus.php';
            break;
          case 'kategoriberita':
              $page = 'kategoriberita/index.php';
            break;
          case 'tambahkategoriberita':
              $page = 'kategoriberita/tambah.php';
            break;
          case 'editkategoriberita':
              $page = 'kategoriberita/edit.php';
            break;
          case 'hapuskategoriberita':
              $page = 'kategoriberita/hapus.php';
            break;
          case 'berita':
              $page = 'berita/index.php';
            break;
          case 'tambahberita':
              $page = 'berita/tambah.php';
            break;
          case 'editberita':
              $page = 'berita/edit.php';
            break;
          case 'hapusberita':
              $page = 'berita/hapus.php';
            break;*/
          default:
            # code...
            break;
        }
        require('data/'.$page);
      }
      ?>
      </div>
    </div>
    
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col4">
  <div id="footer">
    <div class="footbox">
      <h2>Lacus interdum</h2>
      <ul>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li><a href="#">Praesent et eros</a></li>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li class="last"><a href="#">Praesent et eros</a></li>
      </ul>
    </div>
    <div class="footbox">
      <h2>Lacus interdum</h2>
      <ul>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li><a href="#">Praesent et eros</a></li>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li class="last"><a href="#">Praesent et eros</a></li>
      </ul>
    </div>
    <div class="footbox">
      <h2>Lacus interdum</h2>
      <ul>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li><a href="#">Praesent et eros</a></li>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li class="last"><a href="#">Praesent et eros</a></li>
      </ul>
    </div>
    <div class="footbox">
      <h2>Lacus interdum</h2>
      <ul>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li><a href="#">Praesent et eros</a></li>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li class="last"><a href="#">Praesent et eros</a></li>
      </ul>
    </div>
    <div class="footbox last">
      <h2>Lacus interdum</h2>
      <ul>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li><a href="#">Praesent et eros</a></li>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li class="last"><a href="#">Praesent et eros</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col5">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2014 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>