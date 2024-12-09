<?php
$host = 'localhost'; // Server database
$user = 'root';      // Username database
$pass = '';          // Password database
$dbname = 'risk_management'; // Nama database

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
