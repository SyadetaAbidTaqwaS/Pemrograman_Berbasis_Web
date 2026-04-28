<?php
$conn = new mysqli('localhost', 'root', '', 'toko_iphone');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>