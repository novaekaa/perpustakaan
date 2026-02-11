<?php
session_start();
include "../koneksi.php";
if ($_SESSION['role']!='admin') header ("location../login.php");
?>

<h2>Dashboard Admin</h2>
<table border ="1" cellpadding="20">
  <tr>
    <td><a href="buku.php">Kelola Buku</td>
    <td><a href="anggota.php">Kelola Anggota</td>
    <td><a href="transaksi.php">Kelola Transaksi</td>
</tr>