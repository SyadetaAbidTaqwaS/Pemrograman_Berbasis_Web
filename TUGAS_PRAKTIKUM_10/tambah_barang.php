<?php include 'nav.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <body class="bg-light">
        <div class="container mt-5">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    Tambah iPhone
                </div>
                
                <div class="card-body">
                    <form method="post" action="proses_tambah_barang.php">
                        
                        <div class="mb-3">
                            <input type="text" name="barang" class="form-control" placeholder="Nama iPhone" required>
                        </div>
                        
                        <div class="mb-3">
                            <input type="text" name="supplier" class="form-control" placeholder="Supplier" required>
                        </div>
                        
                        <div class="mb-3">
                            <input type="number" name="tahun_produksi" class="form-control" placeholder="Tahun" required>
                        </div>
                        
                        <div class="mb-3">
                            <input type="number" name="harga" class="form-control" placeholder="Harga" required>
                        </div>
                        
                        <div class="mb-3">
                            <input type="number" name="stok" class="form-control" placeholder="Stok" required>
                        </div>
                        
                        <button class="btn btn-success w-100">Simpan</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </body>
    </html>