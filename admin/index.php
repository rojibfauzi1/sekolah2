<?php  
session_start();
ob_start();

require_once ('../conf/koneksi.php');
include 'asset/custom/php/head.php'; 

$gambar = $_SESSION['gambar'];
$user = $_SESSION['username'];
$login = $_SESSION['login'];


if($login != '1'){
  session_destroy();
  /*header("Refresh: 90; URL=login.php");*/
  header("location: ../index.php");
}
?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'asset/custom/php/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../upload/admin/<?php echo $gambar ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?p=dasboard_admin"><i class="fa fa-circle-o"></i> Dashboard</a></li>
            <li><a href="?p=admin"><i class="fa fa-circle-o"></i> Admin</a></li>

          </ul>
        </li>
      
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Data</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            
            
            
            <li><a href="?p=siswa"><i class="fa fa-circle-o"></i>Siswa</a></li>
            <li><a href="?p=kelas"><i class="fa fa-circle-o"></i>Kelas</a></li>
            <li><a href="?p=mapel"><i class="fa fa-circle-o"></i>Mata Pelajaran</a></li>
            <li><a href="?p=jurusan"><i class="fa fa-circle-o"></i>Jurusan</a></li>
            <li><a href="?p=tahun"><i class="fa fa-circle-o"></i>Tahun</a></li>
            <li><a href="?p=wali"><i class="fa fa-circle-o"></i>Wali</a></li>
            <li><a href="?p=guru"><i class="fa fa-circle-o"></i>Guru</a></li>
            <li><a href="?p=gurumapel"><i class="fa fa-circle-o"></i>Guru Mapel</a></li>
            <li><a href="?p=siswakelas"><i class="fa fa-circle-o"></i>Siswa Kelas</a></li>
            <li><a href="?p=kategorinilai"><i class="fa fa-circle-o"></i>Kategori Nilai</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Konten</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=kategori"><i class="fa fa-circle-o"></i> Kategori Berita</a></li>
            
            <li><a href="?p=profil"><i class="fa fa-circle-o"></i>Profil</a></li>
            <li><a href="?p=berita"><i class="fa fa-circle-o"></i>Berita</a></li>
            <li><a href="?p=kategoriberita"><i class="fa fa-circle-o"></i>Kategori Berita</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="?p=gallery">
            <i class="fa fa-edit"></i> <span>Galeri</span>
       
          </a>
          
        </li>
        
        
     
        </li>
        
       
        <li class="header">LABELS</li>
        <li><a href="?p=kritiksaran"><i class="fa fa-circle-o text-red"></i> <span>Kritik Saran</span></a></li>
        <li><a href="logout.php"><i class="fa fa-circle-o text-yellow"></i> <span>Logout</span></a></li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

 <?php  
/*include 'data/sidebar.php';*/

 ?>
   <div class="content-wrapper">
       <section class="content">
 <?php
      if(isset($_GET['p'])){
        switch ($_GET['p']) {
          case 'dasboard_admin':
              $page = 'dasboard_admin.php';
            break;
          case 'admin':
              $page = 'administrator/index.php';
            break;
          case 'tambahadmin':
              $page = 'administrator/tambah.php';
            break;
          case 'editadmin':
              $page = 'administrator/edit.php';
            break;
          case 'hapusadmin':
              $page = 'administrator/hapus.php';
            break;
          case 'siswa':
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
           case 'tambahList':
              $page = 'siswakelas/tambahList.php';
            break;
          case 'tambahData':
              $page = 'siswakelas/tambahData.php';
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
            break;
          default:
            # code...
            break;
        }
        require('data/'.$page);
      }
      ?>   </section>
   </div>
  <!-- /.content-wrapper -->
<?php include 'asset/custom/php/footer2.php'; ?>

<?php include 'data/sidebar_right.php'; ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php include 'asset/custom/php/footer.php'; ?>





