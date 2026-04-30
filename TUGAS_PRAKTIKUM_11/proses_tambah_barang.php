<?php
include 'koneksi_db.php';

$stmt = $conn->prepare("INSERT INTO barang (Nama_Barang, Supplier, Tahun_Produksi, Harga, Stok) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssiii", $_POST['barang'], $_POST['supplier'], $_POST['tahun_produksi'], $_POST['harga'], $_POST['stok']);

$stmt->execute();

header("Location: tambah_barang.php");
?>