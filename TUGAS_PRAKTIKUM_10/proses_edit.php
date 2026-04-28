<?php
include 'koneksi_db.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $id=$_POST['id'];
    $barang=$_POST['barang'];
    $supplier=$_POST['supplier'];
    $tahun=$_POST['tahun_produksi'];
    $harga=$_POST['harga'];
    $stok=$_POST['stok'];
    
    $stmt=$conn->prepare("UPDATE barang SET Nama_Barang=?, Supplier=?, Tahun_Produksi=?, Harga=?, stok=? WHERE ID=?");
    $stmt->bind_param("ssiiii",$barang,$supplier,$tahun,$harga,$stok,$id);
    
    if($stmt->execute()){
        header("Location:index.php?message=Data berhasil diupdate");
    }else{
        header("Location:index.php?message=Gagal update");
    }
}
    ?>