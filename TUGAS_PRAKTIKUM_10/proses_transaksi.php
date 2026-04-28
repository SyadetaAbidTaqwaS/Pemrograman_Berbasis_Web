<?php
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $conn->begin_transaction();

    try {
        $pelanggan_id = $_POST['pelanggan_id'];
        $tanggal_pesanan = date('Y-m-d');
        $total_harga = 0;

        $stmt = $conn->prepare("INSERT INTO Pesanan (Tanggal_Pesanan, Pelanggan_ID, Total_Harga) VALUES (?, ?, ?)");
        $stmt->bind_param("sid", $tanggal_pesanan, $pelanggan_id, $total_harga);
        $stmt->execute();

        $pesanan_id = $conn->insert_id;

        foreach ($_POST['barang'] as $barang) {

            $barang_id = $barang['id'];
            $kuantitas = $barang['kuantitas'];

            $stmt = $conn->prepare("SELECT Harga, Stok FROM barang WHERE ID = ?");
            $stmt->bind_param("i", $barang_id);
            $stmt->execute();
            $stmt->bind_result($harga, $stok);
            $stmt->fetch();
            $stmt->close();

            if ($stok < $kuantitas) {
                throw new Exception("Stok tidak cukup!");
            }

            $stmt = $conn->prepare("INSERT INTO Detail_Pesanan (Pesanan_ID, Barang_ID, Kuantitas, Harga_Per_Satuan) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiid", $pesanan_id, $barang_id, $kuantitas, $harga);
            $stmt->execute();

            $total_harga += $kuantitas * $harga;

            $stmt = $conn->prepare("UPDATE barang SET Stok = Stok - ? WHERE ID = ?");
            $stmt->bind_param("ii", $kuantitas, $barang_id);
            $stmt->execute();
        }

        $stmt = $conn->prepare("UPDATE Pesanan SET Total_Harga = ? WHERE ID = ?");
        $stmt->bind_param("di", $total_harga, $pesanan_id);
        $stmt->execute();

        $conn->commit();

        header("Location: transaksi.php?message=Pesanan berhasil dibuat");
        exit;

    } catch (Exception $e) {

        $conn->rollback();

        header("Location: transaksi.php?message=Gagal: " . $e->getMessage());
        exit;
    }
}
?>