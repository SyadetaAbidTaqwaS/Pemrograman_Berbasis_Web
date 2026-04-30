<?php include 'nav.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <body class="bg-light">
        <div class="container mt-5">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    Tambah Pelanggan
                </div>
                
                <div class="card-body">
                    <form action="proses_tambah_pelanggan.php" method="POST">
                        
                        <input type="text" name="nama" class="form-control mb-3" placeholder="Nama" required>
                        <textarea name="alamat" class="form-control mb-3" placeholder="Alamat"></textarea>
                        <input type="email" name="email" class="form-control mb-3" placeholder="Email">
                        <input type="text" name="no_telp" class="form-control mb-3" placeholder="No HP">
                        
                        <button class="btn btn-primary w-100">Simpan</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </body>
    </html>