<?php
include 'koneksi_db.php';

$stmt = $conn->prepare("DELETE FROM barang WHERE ID=?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();

header("Location: index.php");
?>