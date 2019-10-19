<?php
include "koneksi.php";
$kategori = $_POST['kategori'];
$produk = $_POST['produk'];
$stok = $_POST['stok'];
$deskripsi = $_POST['deskripsi'];

$sql = "INSERT INTO products (name, stok, deskripsi, category_id) VALUES ('$produk', '$stok', '$deskripsi', '$kategori')";

if ($conn->query($sql) === TRUE) {
	$pesan = "sukses";

	header("location:../index.php?pesan=".$pesan."&kat=add");
} else {
    $pesan = "gagal";
	header("location:../index.php?pesan=".$pesan."&kat=add");
}
?>