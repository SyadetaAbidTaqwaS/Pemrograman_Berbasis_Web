<?php
include 'koneksi_db.php';

if (isset($_POST['simpan']) || $_SERVER['REQUEST_METHOD'] === 'POST') {

    $stmt = $conn->prepare("INSERT INTO pelanggan (Nama, Alamat, Email, Telepon) VALUES (?, ?, ?, ?)");

    $stmt->bind_param("ssss",
        $_POST['nama'],
        $_POST['alamat'],
        $_POST['email'],
        $_POST['no_telp']
    );

    $stmt->execute();

    header("Location: index.php");
}
?>