<?php 
include 'conf/koneksi.php';
?>
 <div class="fl_left">
      <h2>Search</h2>
      <form class="clear" method="post" action="search.php">
        <fieldset>
        
          <input type="text" value="" name="search" placeholder="Search Here">
          <button class="fa fa-search" type="submit" name="submit" title="Search"><em>Search</em></button>
        </fieldset>
      </form>

      <ul style="margin-top:20px">
      <h3 style="margin-top:10px;">Arsip</h3>
        <?php
        $sql = "SELECT distinct date_format(tanggal,'%M %Y') as bulantahun FROM berita ";
        $s = $conn->query($sql);
        foreach($s as $data){
        ?>
        <li>
          <div ><a href="#"></a></div>
          <p><strong><a href="detail_arsip.php?arsip=<?php echo $data['bulantahun'] ?>"><?php echo $data['bulantahun']; ?></a></strong></p>
          
        </li>
        <?php } ?>
      </ul>

      <ul style="margin-top:100px">
      <h3 style="margin-top:10px; ">Kategori</h3>
        <?php
        $sql = "SELECT * FROM kategoriberita ";
        $s = $conn->query($sql);
        foreach($s as $data){
        ?>
        <li >
          
          <p><strong><a href="detail_kategori.php?kategori=<?php echo $data['kd_kategoriberita'] ?>"><?php echo $data['jenis_berita']; ?></a></strong></p>
          
        </li>
        <?php } ?>
      </ul>
    </div>