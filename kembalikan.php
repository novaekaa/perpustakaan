<?php
session_start();
include "../koneksi.php";

if(isset($_GET['id'])){
    mysqli_query($conn,"UPDATE transaksi SET status='kembali' WHERE id_transaksi='$_GET[id]'");
    header("Location:kembalikan.php"); exit;
}

$data = mysqli_query($conn,"
SELECT * FROM transaksi 
WHERE id_users='$_SESSION[id_users]' AND status='pinjam'
");

while($d=mysqli_fetch_assoc($data)){
    echo "Transaksi ".$d['id_transaksi'];
    echo " <a href='?id=".$d['id_transaksi']."'>Kembalikan</a><br>";
}