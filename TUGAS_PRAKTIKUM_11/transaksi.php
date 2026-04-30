<?php
include 'koneksi_db.php';
include 'nav.php';

$barang_result = $conn->query("SELECT ID, Nama_Barang FROM barang");
$pelanggan_result = $conn->query("SELECT ID, Nama FROM Pelanggan");
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <body class="bg-light">
        <div class="container mt-5">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    Buat Pesanan
                </div>
                
                <div class="card-body">
                    
                    <?php if(isset($_GET['message'])): ?>
                        <div class="alert alert-info"><?= $_GET['message'] ?></div>
                        <?php endif; ?>
                        
                        <form method="post" action="proses_transaksi.php">
                            
                            <select class="form-select mb-3" name="pelanggan_id">
                                <option>Pilih Pelanggan</option>
                                <?php while ($row = $pelanggan_result->fetch_assoc()): ?>
                                    <option value="<?= $row['ID'] ?>"><?= $row['Nama'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                                
                                <select class="form-select mb-3" name="barang[1][id]">
                                    <option>Pilih iPhone</option>
                                    <?php while ($row = $barang_result->fetch_assoc()): ?>
                                        <option value="<?= $row['ID'] ?>"><?= $row['Nama_Barang'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                    
                                    <input type="number" name="barang[1][kuantitas]" class="form-control mb-3" placeholder="Jumlah">
                                    
                                    <button class="btn btn-success w-100">Simpan Pesanan</button>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </body>
                </html>