<?php include 'header.php'; ?>
<body>
<?php 
include 'asset/php/login.php';
include 'asset/php/header.php';
 ?>
<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="homecontent">
    <div class="fl_right">
    <h2>Berita Terbaru</h2>
      <div class="column2">
        <?php
             $limit = 20;
            $jumlah_record = $conn->query("SELECT * from berita");
            $jml = $jumlah_record->num_rows;
            $halaman = ceil($jml / $limit);
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

            $start = ($page - 1) * $limit;
            if(isset($_POST['submit'])){
              $search = $_POST['search'];
            }
            

            $sql = "SELECT * FROM berita where judul like '%$search%' order by tanggal desc limit $start,$limit";
            $s = $conn->query($sql);
            while($row=$s->fetch_assoc()){
            ?>
<ul >
            <li><a href="detail_berita.php?id=<?php echo $row['id_berita'] ?>"><?php echo $row['judul'] ?></a></li>
          </ul>
            <?php } ?>
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