<?php
include "../koneksi.php";

// TAMBAH / EDIT
if(isset($_POST['simpan'])){
    $id = $_POST['id'];
    $j  = $_POST['judul'];
    $t  = $_POST['tahun'];
    $p  = $_POST['penulis'];

    if($id==''){
        mysqli_query($conn,"INSERT INTO buku (judul_buku,tahun_terbit,penulis) 
        VALUES ('$j','$t','$p')");
    }else{
        mysqli_query($conn,"UPDATE buku SET 
        judul_buku='$j',
        tahun_terbit='$t',
        penulis='$p'
        WHERE id_buku='$id'");
    }
    header("Location: buku.php");
}

// HAPUS
if(isset($_GET['hapus'])){
    mysqli_query($conn,"DELETE FROM buku WHERE id_buku='$_GET[hapus]'");
    header("Location: buku.php");
}

// AMBIL DATA EDIT
$edit = ['id_buku'=>'','judul_buku'=>'','tahun_terbit'=>'','penulis'=>''];
if(isset($_GET['edit'])){
    $e = mysqli_fetch_assoc(mysqli_query($conn,
        "SELECT * FROM buku WHERE id_buku='$_GET[edit]'"));
    $edit = $e;
}

$data = mysqli_query($conn,"SELECT * FROM buku");
?>

<h2>CRUD Buku</h2>

<form method="post">
<input type="hidden" name="id" value="<?= $edit['id_buku']; ?>">
<input type="text" name="judul" placeholder="Judul" value="<?= $edit['judul_buku']; ?>" required>
<input type="text" name="tahun" placeholder="Tahun" value="<?= $edit['tahun_terbit']; ?>" required>
<input type="text" name="penulis" placeholder="Penulis" value="<?= $edit['penulis']; ?>" required>
<button name="simpan">Simpan</button>
</form>

<hr>

<table border="1" cellpadding="8">
<tr>
<th>No</th>
<th>Judul</th>
<th>Tahun</th>
<th>Penulis</th>
<th>Aksi</th>
</tr>

<?php $no=1; while($d=mysqli_fetch_assoc($data)){ ?>
<tr>
<td><?= $no++; ?></td>
<td><?= $d['judul_buku']; ?></td>
<td><?= $d['tahun_terbit']; ?></td>
<td><?= $d['penulis']; ?></td>
<td>
<a href="?edit=<?= $d['id_buku']; ?>">Edit</a> |
<a href="?hapus=<?= $d['id_buku']; ?>" onclick="return confirm('Hapus?')">Hapus</a>
</td>
</tr>
<?php } ?>

</table>