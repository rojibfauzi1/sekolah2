<?php
session_start();
unset($_SESSION['login']);

unset($_SESSION['username']);
unset($_SESSION['password']);
header("Refresh: 0; URL=login.php");

?>