<?php 
error_reporting(0);
session_start();
include '../sekolah2/proses_login.php'; ?>
<div class="wrapper col0">
  <div id="topbar">
    <div id="slidepanel">
      <div class="topbox">
        <h2>Nullamlacus dui ipsum</h2>
        <p>Nullamlacus dui ipsum conseque loborttis non euisque morbi penas dapibulum orna. Urnaultrices quis curabitur phasellentesque congue magnis vestibulum quismodo nulla et feugiat. Adipisciniapellentum leo ut consequam ris felit elit id nibh sociis malesuada.</p>
        <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
      </div>
      <div class="topbox">
        <h2>Teachers Login Here</h2>
        <form action="#" method="post">
          <fieldset>
            <legend>Teachers Login Form</legend>
            <label for="teachername">Username:
              <input type="text" name="teachername" id="teachername" value="" />
            </label>
            <label for="teacherpass">Password:
              <input type="password" name="teacherpass" id="teacherpass" value="" />
            </label>
            <label for="teacherremember">
              <input class="checkbox" type="checkbox" name="teacherremember" id="teacherremember" checked="checked" />
              Remember me</label>
            <p>
              <input type="submit" name="teacherlogin" id="teacherlogin" value="Login" />
              &nbsp;
              <input type="reset" name="teacherreset" id="teacherreset" value="Reset" />
            </p>
          </fieldset>
        </form>
      </div>
      <div class="topbox last">
        <h2>Pupils Login Here</h2>
        <form action="" method="post">
          <fieldset>
            <legend>Login Form</legend>
            <label for="pupilname">Username:
              <input type="text" name="username" id="pupilname" value="" />
            </label>
            <label for="pupilpass">Password:
              <input type="password" name="password" id="pupilpass" value="" />
            </label>
            <label for="pupilremember">
              <input class="checkbox" type="checkbox" name="pupilremember" id="pupilremember" checked="checked" />
              Remember me</label>
            <p>
              <input type="submit" name="login" value="Login" />
              &nbsp;
              <input type="reset" name="pupilreset" id="pupilreset" value="Reset" />
            </p>
          </fieldset>
        </form>
      </div>
      <br class="clear" />
    </div>
    <div id="loginpanel">
      <ul>
        <li class="left"style="float:left"><?php if($_SESSION['username'] || $_SESSION['nama_guru'] || $_SESSION['nama_siswa']){
  echo "<a href='../sekolah2/admin/logout.php' style='padding-right:20px;float:left'>Logout</a>";
  }else{
    echo "Login >>";
    } ?></li>
        <li class="right" id="toggle" style="float:right"><a id="slideit" href="#slidepanel">
<?php if($_SESSION['username']){
  echo "<a href='../sekolah2/admin/index.php' style='float:right'>$_SESSION[username]</a>";
  }elseif ($_SESSION['nama_guru']) {
    echo "<a href='?p=dasboard_guru' style='float:right'>$_SESSION[nama_guru]</a>";
  }elseif ($_SESSION['nama_siswa']) {
    echo "<a href='?p=dasboard_siswa' style='float:right'>$_SESSION[nama_siswa]</a>";
  }else{
    echo "Administrator";
    } ?>
</a><a id="closeit" style="display: none;" href="#slidepanel">Close Panel</a></li>
      </ul>
    </div>
    
    <br class="clear" />
  </div>
</div>