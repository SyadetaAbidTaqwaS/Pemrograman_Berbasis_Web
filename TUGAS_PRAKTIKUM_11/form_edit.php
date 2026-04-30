<?php
include 'koneksi_db.php';
include 'nav.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM barang WHERE ID=?");
$stmt->bind_param("i",$id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <body class="bg-light">
        <div class="container mt-5">
            <div class="card shadow">
                <div class="card-header bg-warning">
                    Edit iPhone
                </div>
                
                <div class="card-body">
                    <form method="post" action="proses_edit.php">
                        
                        <input type="hidden" name="id" value="<?= $row['ID'] ?>">
                        
                        <input type="text" name="barang" class="form-control mb-3" value="<?= $row['Nama_Barang'] ?>">
                        <input type="text" name="supplier" class="form-control mb-3" value="<?= $row['Supplier'] ?>">
                        <input type="number" name="tahun_produksi" class="form-control mb-3" value="<?= $row['Tahun_Produksi'] ?>">
                        <input type="number" name="harga" class="form-control mb-3" value="<?= $row['Harga'] ?>">
                        <input type="number" name="stok" class="form-control mb-3" value="<?= $row['stok'] ?>">
                        
                        <button class="btn btn-success w-100">Update</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </body>
    </html>