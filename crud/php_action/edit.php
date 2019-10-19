<?php
include "koneksi.php";
$id = $_POST['id'];
$kategori = $_POST['kategori'];
$produk = $_POST['produk'];
$stok = $_POST['stok'];
$deskripsi = $_POST['deskripsi'];

$sql3 = "UPDATE products SET name='$produk', category_id='$kategori', stok='$stok', deskripsi='$deskripsi' WHERE id='$id'";

if (mysqli_query($conn, $sql3)) {
	$pesan = "sukses";
	header("location:../index.php?pesan=".$pesan."&kat=edit");
} else {
	$pesan = "gagal";
	header("location:../index.php?pesan=".$pesan."&kat=edit");
}
