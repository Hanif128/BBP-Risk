<?php
$servername = "localhost";
$username = "root"; // atau sesuaikan dengan username database Anda
$password = ""; // atau sesuaikan dengan password database Anda
$dbname = "risk_management"; // nama database yang telah Anda buat

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
