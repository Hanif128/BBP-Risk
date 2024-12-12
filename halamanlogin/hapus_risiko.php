<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "risk_management";

$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_GET['id'];

$sql = "DELETE FROM form_risiko WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Data berhasil dihapus!";
} else {
    echo "Terjadi kesalahan!";
}

$stmt->close();
$conn->close();
header("Location: man-risk.php"); // Redirect kembali ke halaman manajemen risiko
exit;
?>
