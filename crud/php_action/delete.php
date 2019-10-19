<?php
include "koneksi.php";
$id = $_GET['id'];
$sql = "DELETE FROM products WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
	$pesan = "sukses";
	header("location:../index.php?pesan=".$pesan."&kat=delete");
} else {
    $pesan = "gagal";
	header("location:../index.php?pesan=".$pesan."&kat=delete");
}