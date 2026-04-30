<?php
include 'koneksi_db.php';

$query = "
SELECT Pesanan.ID AS Pesanan_ID, Pelanggan.Nama, Pesanan.Tanggal_Pesanan, Pesanan.Total_Harga
FROM Pesanan
JOIN Pelanggan ON Pesanan.Pelanggan_ID = Pelanggan.ID
";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Data Pesanan</title>
</head>

<body>
    
<?php include 'nav.php'; ?>

<div class="container mt-4">
    <h2>Daftar Pesanan iPhone</h2>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Total</th>
            </tr>
        </thead>
        
        <tbody>
            <?php while($row=$result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['Pesanan_ID'] ?></td>
                    <td><?= $row['Nama'] ?></td>
                    <td><?= $row['Tanggal_Pesanan'] ?></td>
                    <td>Rp<?= number_format($row['Total_Harga']) ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
            
        </table>
    </div>
    
</body>
</html>