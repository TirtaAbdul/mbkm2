<?php
session_start(); //memulai session
session_unset(); //hapus semua variabel session
session_destroy(); //hapus session

header("Location: login.php"); //arahkan ke halaman login
exit();
?>
