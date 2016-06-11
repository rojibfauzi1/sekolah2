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
          $sql = "SELECT * FROM berita order by tanggal desc limit 0,5";
          $s = $conn->query($sql);
          while ($row=$s->fetch_assoc()) {
          ?>  
          <li>
            <h2><?php echo $row['judul'] ?></h2>
            <img width="100px" style="display:inline" src="upload/berita/<?php echo $row['gambar'] ?>" />
            <br/><br/><p><?php echo substr($row['isi'], 0,200) ?></p>
            <p class="readmore"><a href="detail_berita.php?id=<?php echo $row['kd_berita'] ?>">Continue Reading &raquo;</a></p>
          </li>
          <?php } ?>
        </ul>
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