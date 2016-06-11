<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['nama_guru']);
unset($_SESSION['nama_siswa']);
unset($_SESSION['nis']);
unset($_SESSION['nip']);
unset($_SESSION['username']);
unset($_SESSION['password']);
header("Refresh: 0; URL=../index.php");

?>