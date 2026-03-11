<?php
$namabarang = ["Komputer", "Laptop", "Mouse", "Keyboard"];
$hargasatuan = [900, 700, 300, 150];
$jumlahbeli = 2;
$pajak = 0.1;
$totalharga = $jumlahbeli * $hargasatuan[3];

echo "<h1>Perhitungan Total Pembelian Barang (Dengan Array) </h1>";
echo "<hr style='width:40%; border:2px solid black; margin-left:0;'>";
echo "Nama Barang : " . $namabarang[3] . "<br>";
echo "Harga Satuan : Rp " . $hargasatuan[3] . ".000" . "<br>";
echo "Jumlah Beli : " . $jumlahbeli . "<br>";
echo "Total Harga (Sebelum Pajak) : Rp " . $totalharga . ".000" . "<br>";
echo "Pajak (10%): Rp " . $pajak * $totalharga . ".000" . "<br>";
echo "<b>Total Bayar : Rp </b>" . $totalharga + $totalharga * $pajak . "<b>.000</b>" . "<br>";
?>