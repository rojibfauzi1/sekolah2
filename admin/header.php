
<!-- ####################################################################################################### -->
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><a href="index.html">SMKN TEPUS</a></h1>
      <p>Free Website Template</p>
    </div>
    <div id="topnav">
      <ul  class="dropmenu">
        <li ><a href="../index.php">Home</a></li>
         <li><a href="#">Profil</a>
           <ul style="z-index:9999">
          <?php  
        $sql = "SELECT * FROM profil order by kd_profil desc limit 0,10";
        $s = $conn->query($sql);
        while($row=$s->fetch_assoc()){
        ?>
            <li><a href="profil.php?id=<?php echo $row['kd_profil'] ?>"><?php echo $row['profil'] ?></a></li>
        <?php } ?>
          </ul>
         </li>
      
        
          <li><a class="drop" href="pages/full-width.html">Direktori</a>
            <ul style="z-index:9999">
              <li><a href="../d_guru.php">Guru</a></li>
              <li><a href="../d_siswa.php">Siswa</a></li>
            </ul>
          </li>
        
        
        <li class="last"><a href="about.php">Tentang Kami</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
