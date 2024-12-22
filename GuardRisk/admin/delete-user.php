<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "risk_management";

$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>
        alert('Data berhasil dihapus!');
        window.location.href = 'all-users.php';
    </script>";
} else {
    echo "<script>
        alert('Error: " . $conn->error . "');
        window.history.back();
    </script>";
}

$stmt->close();
$conn->close();

exit;
?>
