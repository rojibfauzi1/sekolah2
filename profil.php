<?php include 'header.php'; ?>
<body>
<?php 
include 'conf/koneksi.php';
include 'asset/php/login.php';
include 'asset/php/header.php';
 ?>

<div class="wrapper col3">
  <div id="homecontent">
    <div class="fl_right">
    <h2>Profil</h2>
      <div class="column2">
        <?php 
        $sql = "SELECT * FROM profil Where kd_profil='".$_GET['id']."'";
        $s=$conn->query($sql);
        while($row=$s->fetch_assoc()){
        ?>
        <h3><?php echo $row['profil']; ?></h3>
        <p><?php echo $row['keterangan']; ?></p>
        <?php } ?>
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