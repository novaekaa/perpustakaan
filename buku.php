<?php
session_start();
include "../koneksi.php";

$data = mysqli_query($conn, "SELECT * FROM buku");
?>
<h2>Daftar Buku</h2>
<table border="1" cellpadding="10">
<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Penulis</th>
</tr>
<?php
$no = 1;
while($d = mysqli_fetch_assoc($data)){
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $d['judul_buku']; ?></td>
    <td><?= $d['penulis']; ?></td>
</tr>
<?php } ?>

</table>