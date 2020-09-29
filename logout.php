<?php
session_start();
unset($_SESSION['login_ID']);
unset($_SESSION['login_Nama']);
unset($_SESSION['login_Status']);
session_destroy();

header("Location: home.php");
?>
