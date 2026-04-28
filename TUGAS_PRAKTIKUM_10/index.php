<?php include 'proses_index.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Catalog iPhone</title>
</head>

<body class="bg-light">
<?php include 'nav.php'; ?>

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">

            <h4 class="mb-3">Catalog iPhone</h4>

            <!-- FORM SEARCH -->
            <form method="get" class="row g-3 mb-4">
                <div class="col-md-5">
                    <input type="text" name="Nama_Barang" class="form-control" placeholder="Cari iPhone..."
                    value="<?= htmlspecialchars($search_Nama_Barang) ?>">
                </div>

                <div class="col-md-3">
                    <input type="number" name="Tahun_Produksi" class="form-control" placeholder="Tahun"
                    value="<?= htmlspecialchars($search_tahun) ?>">
                </div>

                <div class="col-md-2">
                    <button class="btn btn-primary w-100">Cari</button>
                </div>

                <div class="col-md-2">
                    <a href="index.php" class="btn btn-secondary w-100">Reset</a>
                </div>
            </form>

            <!-- TABLE -->
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama iPhone</th>
                        <th>Supplier</th>
                        <th>Tahun</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['ID'] ?></td>
                        <td><?= htmlspecialchars($row['Nama_Barang']) ?></td>
                        <td><?= htmlspecialchars($row['Supplier']) ?></td>
                        <td><?= $row['Tahun_Produksi'] ?></td>
                        <td>Rp<?= number_format($row['Harga']) ?></td>
                        <td>
                            <a href="form_edit.php?id=<?= $row['ID'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="proses_hapus.php?id=<?= $row['ID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <!-- PAGINATION -->
            <nav class="mt-3">
                <ul class="pagination justify-content-center">

                    <!-- Previous -->
                    <?php if ($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $page - 1 ?>&Nama_Barang=<?= urlencode($search_Nama_Barang) ?>&Tahun_Produksi=<?= urlencode($search_tahun) ?>">
                                Previous
                            </a>
                        </li>
                    <?php endif; ?>

                    <!-- Nomor -->
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $i ?>&Nama_Barang=<?= urlencode($search_Nama_Barang) ?>&Tahun_Produksi=<?= urlencode($search_tahun) ?>">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>

                    <!-- Next -->
                    <?php if ($page < $total_pages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $page + 1 ?>&Nama_Barang=<?= urlencode($search_Nama_Barang) ?>&Tahun_Produksi=<?= urlencode($search_tahun) ?>">
                                Next
                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </nav>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>