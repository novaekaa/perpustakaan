<?php
session_start();
include "koneksi.php";

$u = $_POST['username']??'';
$p = $_POST['password']??'';

if($u && $p){
    $d = mysqli_fetch_assoc(mysqli_query($conn, "SELECT role FROM users WHERE username='$u' AND password='$p'"));
    $_SESSION['role'] = $d ['role'];
    header ("location:".$d ['role']."/dashboard.php");
}
?>

<form method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
</form>