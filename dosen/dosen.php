<?php
session_start(); //memulai session
if ($_SESSION['role'] != 'dosen') { //jika bukan user, arahkan ke halaman login
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Dosen</title>
</head>
<body>
    <h1>Selamat datang, <?php echo $_SESSION['username']; ?> (Dosen)</h1>
