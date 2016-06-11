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
  header("location: login.php");
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
            <li><a href="?p=profil"><i class="fa fa-circle-o"></i> Profil</a></li>
            <li><a href="?p=paket_wisata"><i class="fa fa-circle-o"></i> Paket Wisata</a></li>
            
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
            <li><a href="?p=berita"><i class="fa fa-circle-o"></i> Berita</a></li>
            
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
          $page = 'admin/index.php';
          break;
        case 'tambahadmin':
          $page = 'admin/tambah.php';
          break;
        case 'editadmin':
          $page = 'admin/edit.php';
          break;
        case 'hapusadmin':
          $page = 'admin/hapus.php';
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
        case 'kategori';
          $page = 'kategori_berita/index.php';
          break;
        case 'tambahkategori';
          $page = 'kategori_berita/tambah.php';
          break;
        case 'editkategori';
          $page = 'kategori_berita/edit.php';
          break;
        case 'hapuskategori';
          $page = 'kategori_berita/hapus.php';
          break;
        case 'gallery':
          $page = 'gallery/index.php';
          break;
        case 'tambahgallery':
          $page = 'gallery/tambah.php';
          break;
        case 'editgallery':
          $page = 'gallery/edit.php';
          break;
        case 'hapusgallery':
          $page = 'gallery/hapus.php';
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
        case 'paket_wisata':
              $page = 'paket_wisata/index.php';
            break;
          case 'tambahpaket_wisata':
              $page = 'paket_wisata/tambah.php';
            break;
          case 'editpaket_wisata':
              $page = 'paket_wisata/edit.php';
            break;
          case 'hapuspaket_wisata':
              $page = 'paket_wisata/hapus.php';
            break;
         case 'kritiksaran':
              $page = 'kritiksaran/index.php';
            break;
         case 'hapuskritiksaran':
              $page = 'kritiksaran/hapus.php';
            break;
         case 'detailkritiksaran':
              $page = 'kritiksaran/detail.php';
            break;
        default:
          # code...
          break;
      }
      require_once('data/'.$page);
    }

?>    </section>
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
