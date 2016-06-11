<?php include 'header.php'; ?>
<body>
<?php 
include 'asset/php/login.php';
include 'asset/php/header.php';
 ?>
<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->

<div class="wrapper col2">
  <div id="featured_slide">
    <?php 
  $sql = "SELECT * FROM berita order by tanggal desc limit 0,5";
  $s = $conn->query($sql);
  while ($row=$s->fetch_assoc()) {
  ?>  
  
    <div class="featured_box"><a href="#"><img src="upload/berita/<?php echo $row['gambar'] ?>" alt="" style="object-fit:cover"/></a>
      <div class="floater">
        <h2><?php echo $row['judul'] ?></h2>
        <p><?php echo substr($row['isi'], 0,200)  ?></p>
        <p class="readmore"><a href="detail_berita.php?id=<?php echo $row['kd_berita'] ?>">Continue Reading &raquo;</a></p>
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
    <div class="fl_right">
    <h2>Berita Terbaru</h2>
      <div class="column2">
        <ul>
          <?php
            $limit = 20;
            $jumlah_record = $conn->query("SELECT * from berita");
            $jml = $jumlah_record->num_rows;
            $halaman = ceil($jml / $limit);
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

            $start = ($page - 1) * $limit;

          $sql = "SELECT * FROM berita where date_format(tanggal,'%M %Y') ='".$_GET['arsip']."' order by tanggal desc limit $start,$limit";
          $s = $conn->query($sql);
          while ($row=$s->fetch_assoc()) {
          ?>  
          <li>
            <h2><?php echo $row['judul'] ?></h2>
            <img width="100px" style="display:inline" src="upload/berita/<?php echo $row['gambar'] ?>" />
            <br/><br/><p><?php echo substr($row['isi'], 0,200)  ?>...</p>
            <p class="readmore"><a href="detail_berita.php?id=<?php echo $row['kd_berita'] ?>">Continue Reading &raquo;</a></p>
          </li>
          <?php } ?>
        </ul>
          <div class="paging">
            <?php
            if($page > 1){

            ?>
            <a href="?page=<?php echo $page - 1 ?>"><</a>
            <?php
            for($x=1;$x<=$halaman;$x++){
            ?>
              <a href="?page=<?php echo $x ?>"><?php echo $x ?></a>
            <?php
              }
            }elseif($page==1){
              for($x=1;$x<=$halaman;$x++){
              ?>
              <a href="?page=<?php echo $x ?>"><?php echo $x ?></a>
            <?php
            }
            ?>
            <a href="?page=<?php echo $page +1 ?>">></a>
           <?php } ?> 
          </div>
        <br class="clear" />
      </div>
      
    </div>
   <?php include 'sidebar.php'; ?>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
<?php include 'asset/php/footer.php'; ?>