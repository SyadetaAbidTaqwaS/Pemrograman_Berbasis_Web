<?php
include 'koneksi_db.php';

// Ambil filter
$search_Nama_Barang = $_GET['Nama_Barang'] ?? '';
$search_tahun = $_GET['Tahun_Produksi'] ?? '';

// Pagination
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Query dasar
$where = "WHERE 1=1";
$params = [];
$types = "";

// Filter nama
if (!empty($search_Nama_Barang)) {
    $where .= " AND Nama_Barang LIKE ?";
    $params[] = "%" . $search_Nama_Barang . "%";
    $types .= "s";
}

// Filter tahun
if (!empty($search_tahun)) {
    $where .= " AND Tahun_Produksi = ?";
    $params[] = $search_tahun;
    $types .= "i";
}

// 🔹 Hitung total data
$count_query = "SELECT COUNT(*) as total FROM barang $where";
$stmt = $conn->prepare($count_query);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$count_result = $stmt->get_result();
$total_data = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_data / $limit);

// 🔹 Ambil data utama
$query = "SELECT * FROM barang $where ORDER BY ID DESC LIMIT ?, ?";
$stmt = $conn->prepare($query);

// Tambah limit ke parameter
$params_with_limit = $params;
$params_with_limit[] = $offset;
$params_with_limit[] = $limit;

$types_with_limit = $types . "ii";

$stmt->bind_param($types_with_limit, ...$params_with_limit);
$stmt->execute();
$result = $stmt->get_result();
?>