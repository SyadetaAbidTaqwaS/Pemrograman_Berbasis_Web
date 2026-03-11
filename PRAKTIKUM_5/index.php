<?php
$namabarang = ["Mouse", "Memori", "Laptop", "Keyboard"];
$hargasatuan = [200, 500, 900, 150];
$jumlahbeli = 2;
$totalharga = $jumlahbeli * $hargasatuan[3];
define("PAJAK", 0.1);
$pajak = $totalharga * PAJAK ;

echo "<h2><b>Perhitungan Total Pembelian Barang (Dengan Array)</b> </h2>";
echo "<hr>";
echo "Nama Barang: " . $namabarang[3] . "<br>";
echo "Harga Satuan: Rp " . $hargasatuan[3] . ".000" . "<br>";
echo "Jumlah Beli: " . $jumlahbeli . "<br>";
echo "Total Harga (Sebelum Pajak): Rp " . $totalharga . ".000" . "<br>";
echo "Pajak (10%): Rp " . $pajak . ".000" . "<br>";
echo "<b>Total Bayar: Rp </b>" . ($totalharga + $pajak) . "<b>.000</b>" . "<br>";
?>