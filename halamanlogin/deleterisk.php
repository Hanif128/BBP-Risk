<?php
include 'db.php';

$id = $_GET['id'];
$query = "DELETE FROM risiko WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    echo "<script>
            alert('Data berhasil dihapus.');
            window.location.href = 'risk_list.php';
          </script>";
} else {
    echo "Error: " . $stmt->error;
}
?>
